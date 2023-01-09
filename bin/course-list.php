<?php

use WillAvelar\Doctrine\Entity\Course;
use WillAvelar\Doctrine\Entity\Phone;
use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$courseRepository = $entityManager->getRepository(Course::class);

/** @var Course[] $studentList */
$courseList = $courseRepository->findAll();

foreach ($courseList as $course) {
    echo "ID: $course->id\nName: $course->name";

    echo PHP_EOL . PHP_EOL;
}