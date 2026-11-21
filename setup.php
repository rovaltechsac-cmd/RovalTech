<?php

// Instalador temporal de Roval Tech para hostings sin acceso SSH. Borrar después de usar.
if (($_GET['key'] ?? '') !== 'roval-setup-2026') {
    http_response_code(404);
    exit;
}

header('Content-Type: text/plain; charset=utf-8');

$dir = __DIR__;
$disabled = array_map('trim', explode(',', (string) ini_get('disable_functions')));

// Preferir el binario CLI de PHP (Composer se niega a correr bajo LSAPI/CGI).
function findPhpBinary()
{
    global $disabled;
    $candidates = [
        '/opt/alt/php81/usr/bin/php',
        '/opt/cpanel/ea-php81/root/usr/bin/php',
        '/usr/local/bin/php',
        '/usr/bin/php',
        '/usr/local/bin/php81',
        '/usr/bin/php81',
        PHP_BINARY,
        'php',
    ];
    foreach ($candidates as $bin) {
        $out = [];
        $code = 0;
        @exec(escapeshellarg($bin) . ' -r "echo PHP_SAPI;" 2>/dev/null', $out, $code);
        $sapi = implode('', $out);
        if ($code === 0 && $sapi === 'cli') {
            return ['bin' => $bin, 'sapi' => $sapi];
        }
    }
    return ['bin' => PHP_BINARY, 'sapi' => PHP_SAPI];
}

$phpInfo = findPhpBinary();
$php = escapeshellarg($phpInfo['bin']);
$phpFlags = $phpInfo['sapi'] === 'cli' ? '' : ' -d register_argc_argv=Off';

// Composer exige HOME/COMPOSER_HOME. Usamos directorios escribibles dentro del repo.
@mkdir($dir . '/.composer', 0777, true);
@mkdir($dir . '/.home', 0777, true);
$envPrefix = 'HOME=' . escapeshellarg($dir . '/.home')
    . ' COMPOSER_HOME=' . escapeshellarg($dir . '/.composer') . ' ';

echo 'PHP: ' . PHP_VERSION . PHP_EOL;
echo 'PHP usado: ' . $phpInfo['bin'] . ' (SAPI: ' . $phpInfo['sapi'] . ')' . PHP_EOL;
echo 'Flags: ' . ($phpFlags ?: '(ninguno)') . PHP_EOL;
echo 'fileinfo (web): ' . (extension_loaded('fileinfo') ? 'SI' : 'NO') . PHP_EOL;
echo 'disable_functions: ' . (string) ini_get('disable_functions') . PHP_EOL;
foreach (['exec', 'shell_exec', 'proc_open', 'passthru', 'system'] as $fn) {
    echo $fn . ': ' . ((function_exists($fn) && !in_array($fn, $disabled)) ? 'SI' : 'NO') . PHP_EOL;
}
echo PHP_EOL;

function runCommand($command, $dir)
{
    global $disabled;
    echo '$ ' . $command . PHP_EOL;
    $out = [];
    $code = 0;
    if (function_exists('exec') && !in_array('exec', $disabled)) {
        exec('cd ' . escapeshellarg($dir) . ' && ' . $command . ' 2>&1', $out, $code);
        echo implode(PHP_EOL, $out) . PHP_EOL;
        echo '(exit ' . $code . ')' . PHP_EOL . PHP_EOL;
        return;
    }
    echo '(no hay funciones de ejecución disponibles)' . PHP_EOL . PHP_EOL;
}

if (!is_file($dir . '/vendor/autoload.php')) {
    echo '--- Instalando Composer ---' . PHP_EOL;
    $composer = $dir . '/composer.phar';
    if (!is_file($composer)) {
        $data = @file_get_contents('https://getcomposer.org/composer-stable.phar');
        if ($data === false) {
            echo 'No se pudo descargar composer.phar' . PHP_EOL;
        } else {
            file_put_contents($composer, $data);
        }
    }
    if (is_file($composer)) {
        runCommand($envPrefix . $php . $phpFlags . ' composer.phar install --no-dev --prefer-dist --optimize-autoloader --no-interaction --ignore-platform-req=ext-fileinfo', $dir);
    }
} else {
    echo 'vendor/ ya existe' . PHP_EOL . PHP_EOL;
}

if (!is_file($dir . '/.env')) {
    echo '--- Creando .env ---' . PHP_EOL;
    copy($dir . '/.env.example', $dir . '/.env');
    foreach ([
        'APP_ENV=production',
        'APP_DEBUG=false',
        'APP_URL=https://kipucloud.com/rovalTech',
    ] as $line) {
        runCommand('sed -i "\#' . explode('=', $line)[0] . '#c' . addslashes($line) . '#" .env', $dir);
    }
} else {
    echo '.env ya existe' . PHP_EOL . PHP_EOL;
}

if (!is_file($dir . '/database/database.sqlite')) {
    @touch($dir . '/database/database.sqlite');
}

echo '--- Laravel ---' . PHP_EOL;
runCommand($envPrefix . $php . $phpFlags . ' artisan key:generate', $dir);
runCommand($envPrefix . $php . $phpFlags . ' artisan migrate --force', $dir);
runCommand($envPrefix . $php . $phpFlags . ' artisan db:seed --force', $dir);
runCommand($envPrefix . $php . $phpFlags . ' artisan optimize:clear', $dir);

echo '--- Estado final ---' . PHP_EOL;
echo 'Vendor: ' . (is_file($dir . '/vendor/autoload.php') ? 'OK' : 'FALTA') . PHP_EOL;
echo 'Env: ' . (is_file($dir . '/.env') ? 'SI' : 'NO') . PHP_EOL;
$log = $dir . '/storage/logs/laravel.log';
echo 'Log: ' . (is_file($log) ? 'SI' : 'NO') . PHP_EOL;
if (is_file($log)) {
    echo implode('', array_slice(file($log), -40));
}
