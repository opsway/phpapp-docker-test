<?php

use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

// load default environment vars from .env file
$envDir = __DIR__ . DIRECTORY_SEPARATOR . '..';
if (file_exists($envDir . '/.env')) {
    $dotenv = new Dotenv\Dotenv($envDir);
    $dotenv->load();
}

// Load configuration
$config = require __DIR__ . '/config.php';

// Build container
$container = new ServiceManager();
(new Config($config['dependencies']))->configureServiceManager($container);

// Inject config
$container->setService('config', $config);

return $container;
