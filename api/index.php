<?php

// 1. Register the Composer Autoloader
require __DIR__ . '/../vendor/autoload.php';

// 2. Boot the Laravel Framework Application
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 3. Handle the Incoming Web Request using Laravel's Kernel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// 4. Send the Output Response back to the user's browser
$response->send();

$kernel->terminate($request, $response);

?>