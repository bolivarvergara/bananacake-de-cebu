<?php

// 1. Force raw text error display
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Register the Composer Autoloader
require __DIR__ . '/../vendor/autoload.php';

// 3. Clear Vercel's compiled cache folder before booting the framework
$cachedConfig = __DIR__ . '/../bootstrap/cache/config.php';
$cachedServices = __DIR__ . '/../bootstrap/cache/services.php';
$cachedPackages = __DIR__ . '/../bootstrap/cache/packages.php';

if (file_exists($cachedConfig)) { @unlink($cachedConfig); }
if (file_exists($cachedServices)) { @unlink($cachedServices); }
if (file_exists($cachedPackages)) { @unlink($cachedPackages); }

// 4. Boot the Framework App Instance
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 5. Send Request through the Kernel Core Pipeline
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// 6. Echo Output Content
$response->send();

$kernel->terminate($request, $response);
