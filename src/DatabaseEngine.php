<?php declare(strict_types=1);

namespace Glacial\Database;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Platforms\SQLitePlatform;
use Doctrine\DBAL\Schema\Table;

require __DIR__ . '/../vendor/autoload.php';

class DatabaseEngine extends Manager {
    private array $config;

    function __construct(array $config) {
        $this->config = $config;
    }

    public function connect(): object {
        if($this->config['type'] === 'sqlite') {
            $platform = new SQLitePlatform();
            $driver = 'pdo_sqlite';
            
            $conn_params = [
                'driver' => $driver,
                'path' => $this->config['path'],
                'platform' => $platform,
            ];
        }
        $conn = DriverManager::getConnection($conn_params);
        return new Manager($conn);
    }
}

class Manager {
    private object $conn;
    public object $schemaManager;

    function __construct(object $conn) {
        $this->conn = $conn;
    }

    public function schema() {
        $conn = $this->conn;
        $this->schemaManager = $conn->createSchemaManager();
        return $this->schemaManager;
    }
}