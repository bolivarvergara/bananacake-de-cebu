<?php

// 1. Force raw error display immediately
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Register the Composer Autoloader
require __DIR__ . '/../vendor/autoload.php';

// 3. Test and catch syntax errors inside bootstrap/app.php BEFORE booting it
try {
    // Explicitly check for syntax errors in your application entry points
    $appPath = __DIR__ . '/../bootstrap/app.php';
    if (file_exists($appPath)) {
        // This validates if the file can be parsed cleanly
        token_get_all(file_get_contents($appPath)); 
    }
} catch (\Throwable $e) {
    echo "<h1>Critical Syntax Error Intercepted!</h1>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . "</p>";
    echo "<p><strong>Line:</strong> " . htmlspecialchars($e->getLine()) . "</p>";
    exit;
}

// 4. Boot the Laravel Framework Application safely
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 5. Handle the Incoming Web Request using Laravel's Kernel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// 6. Send the Output Response back to the browser
$response->send();

$kernel->terminate($request, $response);
