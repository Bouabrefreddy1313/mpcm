<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
echo 'PHP ' . PHP_VERSION . '<br>';
try {
    require __DIR__ . '/../vendor/autoload.php';
    echo 'autoload OK<br>';
    $app = require __DIR__ . '/../bootstrap/app.php';
    echo 'bootstrap OK<br>';
} catch (Throwable $e) {
    echo '<pre>' . $e->getMessage() . "\n" . $e->getFile() . ':' . $e->getLine() . '</pre>';
}