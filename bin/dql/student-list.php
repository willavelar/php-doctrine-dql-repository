<?php

use WillAvelar\Doctrine\Entity\Course;
use WillAvelar\Doctrine\Entity\Phone;
use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$dql = 'SELECT student, phone, course
                    FROM WillAvelar\Doctrine\Entity\Student student
                LEFT JOIN student.phones phone
                LEFT JOIN student.courses course';

$studentList = $entityManager->createQuery($dql)->getResult();

foreach ($studentList as $student) {
    echo "ID: $student->id\nName: $student->name";

    if ($student->phones()->count() > 0) {
        echo PHP_EOL;
        echo "Phones: ";

        echo implode(', ', $student->phones()
            ->map(fn (Phone $phone) => $phone->number)
            ->toArray());
    }

    if ($student->courses()->count() > 0) {
        echo PHP_EOL;
        echo "Courses: ";

        echo implode(', ', $student->courses()
            ->map(fn(Course $course) => $course->name)
            ->toArray());
    }

    echo PHP_EOL . PHP_EOL;
}