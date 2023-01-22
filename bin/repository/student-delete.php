<?php

use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;
use WillAvelar\Doctrine\Repository\DoctrineStudentRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

/** @var DoctrineStudentRepository $studentRepository */
$studentRepository = $entityManager->getRepository(Student::class);

$studentRepository->delete($argv[1]);

