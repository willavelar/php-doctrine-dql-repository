<?php

use WillAvelar\Doctrine\Entity\Course;
use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;
use WillAvelar\Doctrine\Repository\DoctrineStudentRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

/** @var DoctrineStudentRepository $studentRepository */
$studentRepository = $entityManager->getRepository(Student::class);

$studentId = $argv[1];
$courseId = $argv[2];

$studentRepository->enroll(studentId: $studentId, courseId: $courseId);
