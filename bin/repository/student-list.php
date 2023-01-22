<?php

use WillAvelar\Doctrine\Entity\Course;
use WillAvelar\Doctrine\Entity\Phone;
use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);
$studentList = $studentRepository->studentsAndCourses();

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

$dql = 'SELECT COUNT(student) FROM WillAvelar\Doctrine\Entity\Student student';
$entityManager->createQuery($dql)->getSingleScalarResult();