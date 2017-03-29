<?php
// Here you can initialize variables that will be available to your tests

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Assets
{
    private $dbParams;
    private $entityManager;

    public function setDbParams($driver = 'pdo_mysql', $user = 'root', $password = '', $dbname = 'coffeeman', $host = '127.0.0.1'): void
    {
        $this->dbParams = [
            'driver' => $driver,
            'user' => $user,
            'password' => $password,
            'dbname' => $dbname,
            'host' => $host,
        ];
    }

    public function getDbParams(): array
    {
        return $this->dbParams;
    }

    public function setEntityManager(): void
    {
        $paths = [
            __DIR__ . '/../../src/Domain/Workout'
        ];
        $isDevMode  = true;

        $this->setDbParams();

        $config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
        $entityManager = EntityManager::create($this->getDbParams(), $config);

        $this->entityManager = $entityManager;
    }

    public function getEntityManager(): \Doctrine\ORM\EntityManager
    {
        return $this->entityManager;
    }
}