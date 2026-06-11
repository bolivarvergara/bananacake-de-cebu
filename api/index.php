<?php

// 1. Force absolute raw PHP output, bypassing Laravel's broken view engine
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Set up a direct internal fallback syntax interceptor
register_shutdown_function(function () {
    $error = error_get_last();
    if ($error !== null && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        echo "<h1>🚨 PURE PHP SYNTAX ERROR FOUND:</h1>";
        echo "<p><strong>Message:</strong> " . htmlspecialchars($error['message']) . "</p>";
        echo "<p><strong>Broken File:</strong> " . htmlspecialchars($error['file']) . "</p>";
        echo "<p><strong>Line Number:</strong> " . htmlspecialchars($error['line']) . "</p>";
        exit;
    }
});

// 3. Register the Composer Autoloader
require __DIR__ . '/../vendor/autoload.php';

// 4. Run the framework boot sequence inside a raw trap
try {
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );

    $response->send();
    $kernel->terminate($request, $response);
} catch (\Throwable $e) {
    echo "<h1>🔍 Intercepted Critical Framework Crash:</h1>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . "</p>";
    echo "<p><strong>Line:</strong> " . htmlspecialchars($e->getLine()) . "</p>";
    if ($e->getPrevious()) {
        echo "<p><strong>Underlying Cause:</strong> " . htmlspecialchars($e->getPrevious()->getMessage()) . "</p>";
        echo "<p><strong>Underlying File:</strong> " . htmlspecialchars($e->getPrevious()->getFile()) . "</p>";
        echo "<p><strong>Underlying Line:</strong> " . htmlspecialchars($e->getPrevious()->getLine()) . "</p>";
    }
    exit;
}
