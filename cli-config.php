<?php

require 'vendor/autoload.php';

use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;

$config = new PhpFile(__DIR__ . '/migrations.php'); // Or use one of the Doctrine\Migrations\Configuration\Configuration\* loaders

$entityManager = EntityManagerCreator::createEntityManager();

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));