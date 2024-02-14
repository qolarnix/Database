# [WIP] Glacial Database

Simple database interface built on top of Doctrine DBAL

### Get Started
```bash
# coming soon
composer require glacial/database
```

### Example Setup
```php
use Glacial\Database\DatabaseEngine;
use Glacial\Database\Manager;

$config = [
    'type' => 'sqlite',
    'path' => 'database.sqlite'
];

$db = new DatabaseEngine($config);
$conn = $db->connect();

$manager = new Manager($conn);
$manager->schema()->table('users', function($t) {
    $t->addColumn('id', 'integer');
});
```