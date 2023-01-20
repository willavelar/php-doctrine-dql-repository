<?php

use WillAvelar\Doctrine\Entity\Phone;
use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;
use WillAvelar\Doctrine\Repository\DoctrineStudentRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

/** @var DoctrineStudentRepository $studentRepository */
$studentRepository = $entityManager->getRepository(Student::class);

$phones = [];

for ($i = 2; $i < $argc; $i++) {
    $phones[] = $argv[$i];
}

$studentRepository->add($argv[1], $phones);