<?php

use WillAvelar\Doctrine\Entity\Course;
use WillAvelar\Doctrine\Entity\Phone;
use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$dql = 'SELECT course FROM WillAvelar\Doctrine\Entity\Course course';
$courseList = $entityManager->createQuery($dql)->getResult();

foreach ($courseList as $course) {
    echo "ID: $course->id\nName: $course->name";

    echo PHP_EOL . PHP_EOL;
}