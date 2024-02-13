<?php declare(strict_types=1);

use Glacial\Database\DatabaseEngine;

require __DIR__ . '/../vendor/autoload.php';

$config = [
    'type' => 'sqlite',
    'path' => __DIR__ . '/examples/database.sqlite',
];
$db = new DatabaseEngine($config);

$manager = $db->connect();

print_r($manager->schema());