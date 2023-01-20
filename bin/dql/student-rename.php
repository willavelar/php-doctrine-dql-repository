<?php

use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$dql = 'UPDATE WillAvelar\Doctrine\Entity\Student student SET student.name = :name WHERE student.id = :id ';

$parameters = [
    'id' => $argv[1],
    'name' => $argv[2]
];

$entityManager->createQuery($dql)->setParameters($parameters)->execute();