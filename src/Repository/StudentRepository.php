<?php

namespace Alura\Doctrine\Repository;
use Doctrine\ORM\EntityRepository;
use Alura\Doctrine\Entity\Student;

class StudentRepository extends EntityRepository
{
    public function searchCoursesByStudent() 
    {
        $query = $this->createQueryBuilder('a')
	    ->join('a.phones', 't')
	    ->join('a.courses', 'c')
	    ->addSelect('t')
	    ->addSelect('c')
	    ->getQuery();

	return $query->getResult();
    }
}
