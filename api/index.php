<?php

// 1. Paksa aktifkan error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Alihkan folder penyimpan cache & views Laravel ke folder temporary (/tmp) milik Vercel
$storagePath = '/tmp/storage/framework';
if (!is_dir($storagePath . '/views')) {
    mkdir($storagePath . '/views', 0755, true);
}
if (!is_dir($storagePath . '/sessions')) {
    mkdir($storagePath . '/sessions', 0755, true);
}
if (!is_dir($storagePath . '/cache')) {
    mkdir($storagePath . '/cache', 0755, true);
}

// Set env secara runtime agar Laravel tahu folder storage dipindah ke /tmp
putenv("VIEW_COMPILED_PATH={$storagePath}/views");
putenv("SESSION_DRIVER=cookie"); // Pindahkan session ke cookie biar tidak butuh folder write-access

// 3. Jalankan aplikasi Laravel seperti biasa
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Beritahu Laravel konfigurasi path storage yang baru
$app->useStoragePath('/tmp/storage');

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);