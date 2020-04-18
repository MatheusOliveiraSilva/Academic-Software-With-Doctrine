<?php

use Alura\Doctrine\Helper\EntityManagerFactory;
use Alura\Doctrine\Entity\Student;
require_once 'vendor/autoload.php';
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$repository = $entityManager->getRepository(Student::class);

$classStudent = Student::class;
$dql = "SELECT COUNT(a) FROM $classStudent a";

$query = $entityManager->createQuery($dql);
$totalOfStudents = $query->getSingleScalarResult();

echo "Total of students: " . $totalOfStudents[0];

