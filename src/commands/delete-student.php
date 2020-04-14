<?php
require_once 'vendor/autoload.php';
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$student = $entityManager->getReference(Student::class, $id);

$entityManager->remove($student);
$entityManager->flush();
