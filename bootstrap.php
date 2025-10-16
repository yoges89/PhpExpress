<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src/Entity'],
    isDevMode: true,
    proxyDir: '/tmp',
);

// configuring the database connection
$connection = DriverManager::getConnection([
    'driver' => $_ENV['DRIVER'],
    'host' => $_ENV['HOST'],
    'port' => $_ENV['PORT'],
    'user' => $_ENV['DBUSER'],
    'password' => $_ENV['PASSWORD'],
    'dbname' => $_ENV['DBNAME'],
], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);