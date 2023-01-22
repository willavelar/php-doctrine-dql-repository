<?php

namespace WillAvelar\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use WillAvelar\Doctrine\Entity\Course;

class DoctrineCourseRepository extends EntityRepository
{
    public function delete(string $id) : void
    {
        $student = $this->getEntityManager()->find(Course::class, $id);
        $this->getEntityManager()->remove($student);
        $this->getEntityManager()->flush();
    }
    public function add(string $name) : void
    {
        $course = new Course($name);

        $this->getEntityManager()->persist($course);
        $this->getEntityManager()->flush();
    }

    /**
     * @return Course[]
     */
    public function list() : array
    {
        return $this->findAll();
    }
}