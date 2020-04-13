<?php
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once  'vendor/autoload.php';
$student = new Student();
$student->setName("Matthew Oliver");

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$entityManager->persist($student);

$entityManager->flush();
