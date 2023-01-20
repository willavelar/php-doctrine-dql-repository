<?php

use WillAvelar\Doctrine\Entity\Course;
use WillAvelar\Doctrine\Helper\EntityManagerCreator;
use WillAvelar\Doctrine\Repository\DoctrineCourseRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

/** @var DoctrineCourseRepository $courseRepository */
$courseRepository = $entityManager->getRepository(Course::class);

$courseRepository->add($argv[1]);

