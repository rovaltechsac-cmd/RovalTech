<?php

// Instalador temporal de Roval Tech para hostings sin acceso SSH. Borrar después de usar.
if (($_GET['key'] ?? '') !== 'roval-setup-2026') {
    http_response_code(404);
    exit;
}

header('Content-Type: text/plain; charset=utf-8');

$dir = __DIR__;
$php = PHP_BINARY;
$disabled = array_map('trim', explode(',', (string) ini_get('disable_functions')));

echo 'PHP: ' . PHP_VERSION . PHP_EOL;
echo 'PHP binary: ' . $php . PHP_EOL;
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
        runCommand($php . ' composer.phar install --no-dev --prefer-dist --optimize-autoloader --no-interaction', $dir);
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
runCommand($php . ' artisan key:generate', $dir);
runCommand($php . ' artisan migrate --force', $dir);
runCommand($php . ' artisan db:seed --force', $dir);
runCommand($php . ' artisan optimize:clear', $dir);

echo '--- Estado final ---' . PHP_EOL;
echo 'Vendor: ' . (is_file($dir . '/vendor/autoload.php') ? 'OK' : 'FALTA') . PHP_EOL;
echo 'Env: ' . (is_file($dir . '/.env') ? 'SI' : 'NO') . PHP_EOL;
$log = $dir . '/storage/logs/laravel.log';
echo 'Log: ' . (is_file($log) ? 'SI' : 'NO') . PHP_EOL;
if (is_file($log)) {
    echo implode('', array_slice(file($log), -40));
}
