<?php

// 1. Force raw text error display immediately
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Register the Composer Autoloader
require __DIR__ . '/../vendor/autoload.php';

// 3. Capture the exact line and file of the ParseError before Laravel crashes
try {
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );

    $response->send();
    $kernel->terminate($request, $response);
    
} catch (\Throwable $e) {
    // Look for a ParseError or deep exceptions
    $error = $e;
    if ($e->getPrevious()) {
        $error = $e->getPrevious();
    }
    
    echo "<h1>🔍 Found the Hidden Syntax Error!</h1>";
    echo "<p><strong>Error Message:</strong> " . htmlspecialchars($error->getMessage()) . "</p>";
    echo "<p><strong>Broken File Path:</strong> " . htmlspecialchars($error->getFile()) . "</p>";
    echo "<p><strong>Line Number:</strong> " . htmlspecialchars($error->getLine()) . "</p>";
    exit;
}
