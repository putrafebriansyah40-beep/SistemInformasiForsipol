<?php

$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'] ?: __DIR__ . '/../public';

$tmpDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

putenv('APP_CONFIG_CACHE=/tmp/bootstrap/cache/config.php');
putenv('APP_EVENTS_CACHE=/tmp/bootstrap/cache/events.php');
putenv('APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php');
putenv('APP_ROUTES_CACHE=/tmp/bootstrap/cache/routes.php');
putenv('APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');

putenv('SESSION_DRIVER=cookie');
putenv('CACHE_STORE=array');
putenv('LOG_CHANNEL=stderr');

if (getenv('DATABASE_URL') || getenv('POSTGRES_URL')) {
    putenv('DB_CONNECTION=pgsql');
    if (!getenv('DB_HOST')) {
        $dbUrl = getenv('DATABASE_URL') ?: getenv('POSTGRES_URL');
        if (strpos($dbUrl, 'neon.tech') !== false) {
            $parsed = parse_url($dbUrl);
            $host = $parsed['host'];
            $endpointId = str_replace('-pooler', '', explode('.', $host)[0]);
            
            putenv('DB_HOST=' . $host);
            putenv('DB_PORT=' . ($parsed['port'] ?? 5432));
            putenv('DB_USERNAME=' . $parsed['user']);
            putenv('DB_PASSWORD=' . $parsed['pass']);
            putenv('DB_DATABASE=' . ltrim($parsed['path'], '/'));
            // Genius hack: inject options into DSN via sslmode to avoid Laravel parser crash
            putenv("DB_SSLMODE=require;options='endpoint=" . $endpointId . "'");
        } else {
            putenv('DB_URL=' . $dbUrl);
        }
    }
}

// Menampilkan error secara langsung jika ada
ini_set('display_errors', '1');
error_reporting(E_ALL);

// Force HTTPS for assets (Vercel edge termination workaround)
$_SERVER['HTTPS'] = 'on';

require __DIR__ . '/../public/index.php';
