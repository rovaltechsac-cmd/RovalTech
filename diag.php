<?php

// Diagnóstico temporal de Roval Tech. Borrar después de usar.
if (($_GET['key'] ?? '') !== 'roval-diag-2026') {
    http_response_code(404);
    exit;
}

header('Content-Type: text/plain; charset=utf-8');

echo 'PHP: ' . PHP_VERSION . PHP_EOL;
echo 'Vendor: ' . (is_file(__DIR__ . '/vendor/autoload.php') ? 'OK' : 'FALTA') . PHP_EOL;
echo 'Storage writable: ' . (is_writable(__DIR__ . '/storage') ? 'SI' : 'NO') . PHP_EOL;
echo 'Bootstrap/cache writable: ' . (is_writable(__DIR__ . '/bootstrap/cache') ? 'SI' : 'NO') . PHP_EOL;

$env = __DIR__ . '/.env';
echo 'Env: ' . (is_file($env) ? 'SI' : 'NO') . PHP_EOL;
if (is_file($env)) {
    $content = file_get_contents($env);
    foreach (['APP_ENV', 'APP_DEBUG', 'APP_URL', 'DB_CONNECTION', 'APP_KEY'] as $key) {
        if (preg_match('/^' . $key . '=(.*)$/m', $content, $m)) {
            $value = trim($m[1]);
            if ($key === 'APP_KEY') {
                $value = strlen($value) > 10 ? 'SET (' . strlen($value) . ' chars)' : 'VACIO';
            }
            echo $key . ': ' . $value . PHP_EOL;
        } else {
            echo $key . ': (no definido)' . PHP_EOL;
        }
    }
}

$log = __DIR__ . '/storage/logs/laravel.log';
echo PHP_EOL . '--- storage/logs/laravel.log (ultimas 120 lineas) ---' . PHP_EOL;
if (is_file($log)) {
    $lines = file($log);
    echo implode('', array_slice($lines, -120));
} else {
    echo '(no existe)' . PHP_EOL;
}
