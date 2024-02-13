<?php declare(strict_types=1);

use Glacial\Database\DatabaseEngine;

require __DIR__ . '/../vendor/autoload.php';

$config = [
    'type' => 'sqlite',
    'path' => 'database.sqlite',
];
$database = new DatabaseEngine($config);
$conn = $database->connect();

print_r($conn);