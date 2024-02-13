<?php declare(strict_types=1);

namespace Glacial\Database;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Platforms\SQLitePlatform;

require __DIR__ . '/../vendor/autoload.php';

class DatabaseEngine {
    private array $config;

    function __construct(array $config) {
        $this->config = $config;
    }

    public function connect(): Object {
        if($this->config['type'] === 'sqlite') {
            $platform = new SQLitePlatform();
            $driver = 'pdo_mysql';
            
            $conn_params = [
                'driver' => $driver,
                'path' => $this->config['path'],
                'platform' => $platform,
            ];
        }
        return DriverManager::getConnection($conn_params);
    }
}