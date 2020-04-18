<?php

namespace Alura\Doctrine\Repository;
use Doctrine\ORM\EntityRepository;
use Alura\Doctrine\Entity\Student;

class StudentRepository extends EntityRepository
{
    public function searchCoursesByStudent() 
    {
        $entityManager = $this->getEntityManager();
	$classStudent = Student::class;
	$dql = "SELECT student, phones, courses FROM $classStudent student JOIN student.phones phones JOIN student.courses courses";
	$query = $entityManager->createQuery($dql);
	return $query->getResult();
    }
}
