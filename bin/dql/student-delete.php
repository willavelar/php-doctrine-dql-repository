<?php

use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$dql = 'DELETE WillAvelar\Doctrine\Entity\Student student WHERE student.id = :id ';

$parameters = [
    'id' => $argv[1]
];

$entityManager->createQuery($dql)->setParameters($parameters)->execute();