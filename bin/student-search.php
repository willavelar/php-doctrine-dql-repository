<?php

use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student $studentList */
$student = $studentRepository->findOneBy([
    'name' => $argv[1]
]);

if ($student) {
    echo "ID : $student->id\nNome: $student->name\n\n";
}