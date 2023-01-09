<?php

use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

echo $studentRepository->count([]) . PHP_EOL;