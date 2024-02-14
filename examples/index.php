<?php declare(strict_types=1);

use Glacial\Database\DatabaseEngine;
use Glacial\Database\Manager;

require __DIR__ . '/../vendor/autoload.php';

$config = [
    'type' => 'sqlite',
    'path' => __DIR__ . '/examples/database.sqlite',
];
$db = new DatabaseEngine($config);

$conn = $db->connect();

$manager = new Manager($conn);

$manager->schema()->table('users');