<?php

// Paksa aktifkan error reporting agar kalau crash, detailnya muncul di layar browser
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Arahkan ke file autoload Laravel yang asli
require __DIR__ . '/../vendor/autoload.php';

// Jalankan bootstrap aplikasi Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);