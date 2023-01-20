<?php

use WillAvelar\Doctrine\Entity\Course;
use WillAvelar\Doctrine\Entity\Phone;
use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;
use WillAvelar\Doctrine\Repository\DoctrineCourseRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

/** @var DoctrineCourseRepository $courseRepository */
$courseRepository = $entityManager->getRepository(Course::class);
$courseList = $courseRepository->list();

foreach ($courseList as $course) {
    echo "ID: $course->id\nName: $course->name";

    echo PHP_EOL . PHP_EOL;
}