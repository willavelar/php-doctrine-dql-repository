<?php

require_once 'vendor/autoload.php';

$entityManager = \WillAvelar\Doctrine\Helper\EntityManagerCreator::createEntityManager();

var_dump($entityManager);