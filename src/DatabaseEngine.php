<?php declare(strict_types=1);

namespace Glacial\Database;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Platforms\SQLitePlatform;
use Doctrine\DBAL\Schema\Table;

require __DIR__ . '/../vendor/autoload.php';

class DatabaseEngine {
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
        return DriverManager::getConnection($conn_params);
    }
}

class Manager {
    private object $conn;

    function __construct(object $conn) {
        $this->conn = $conn;
    }

    public function schema() {
        $conn = $this->conn;
        $this->conn = $conn->createSchemaManager();
        return $this->conn;
    }
}