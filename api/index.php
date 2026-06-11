<?php

// 1. Force raw error display immediately
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // 2. Register the Composer Autoloader
    require __DIR__ . '/../vendor/autoload.php';

    // 3. Boot the Laravel Framework Application
    $app = require_once __DIR__ . '/../bootstrap/app.php';

    // 4. Handle the Incoming Web Request using Laravel's Kernel
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );

    // 5. Send the Output Response back to the browser
    $response->send();

    $kernel->terminate($request, $response);

} catch (\Throwable $e) {
    // 6. Catch the ParseError before Laravel's exception handler crashes
    echo "<h1>Application Startup Error Found:</h1>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . "</p>";
    echo "<p><strong>Line:</strong> " . htmlspecialchars($e->getLine()) . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    exit;
}
