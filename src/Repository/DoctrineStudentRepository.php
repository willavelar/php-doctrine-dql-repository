<?php

namespace WillAvelar\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use WillAvelar\Doctrine\Entity\Course;
use WillAvelar\Doctrine\Entity\Phone;
use WillAvelar\Doctrine\Entity\Student;

class DoctrineStudentRepository extends EntityRepository
{

    public function rename(string $id, string $newName) : void
    {
        $student = $this->getEntityManager()->find(Student::class, $id);
        $student->name = $newName;

        $this->getEntityManager()->flush();
    }

    public function add(string $studentName, array $phones = []) : void
    {
        $student = new Student($studentName);

        foreach ($phones as $phone) {
            $student->addPhone(new Phone($phone));
        }

        $this->getEntityManager()->persist($student);
        $this->getEntityManager()->flush();
    }
    public function enroll(string $studentId, string $courseId) : void
    {
        $student = $this->getEntityManager()->find(Student::class, $studentId);
        $course = $this->getEntityManager()->find(Course::class, $courseId);

        $student->enrollInCourse($course);

        $this->getEntityManager()->flush();
    }
    public function countAll() : int
    {
        return parent::count([]);
    }

    public function delete(string $id) : void
    {
        $student = $this->getEntityManager()->find(Student::class, $id);
        $this->getEntityManager()->remove($student);
        $this->getEntityManager()->flush();
    }

    /**
     * @return Student[]
     */
    public function studentsAndCourses() : array
    {
        return $this->createQueryBuilder('student')
            ->addSelect('phone')
            ->addSelect('course')
            ->leftJoin('student.phones','phone')
            ->leftJoin('student.courses','course')
            ->getQuery()
            ->getResult();
    }
}