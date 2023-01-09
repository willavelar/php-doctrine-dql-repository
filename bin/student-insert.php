<?php

use WillAvelar\Doctrine\Entity\Phone;
use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student($argv[1]);

foreach ($argv as $index => $value) {

    if ($index == 0 || $index == 1) {
        continue;
    }

    $student->addPhone(new Phone($value));
}

$entityManager->persist($student);
$entityManager->flush();