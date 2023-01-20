<?php

use WillAvelar\Doctrine\Entity\Student;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$dql = 'SELECT student FROM WillAvelar\Doctrine\Entity\Student student WHERE student.name = :name ';
$parameters = ['name' => $argv[1]];

$student = $entityManager->createQuery($dql)->setParameters($parameters)->getSingleResult();

if ($student) {
    echo "ID : $student->id\nNome: $student->name\n\n";
}