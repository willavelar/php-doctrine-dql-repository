<?php

use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$dql = 'SELECT COUNT(student) FROM WillAvelar\Doctrine\Entity\Student student';
$courseList = $entityManager->createQuery($dql)->getSingleScalarResult();

echo $courseList . PHP_EOL;