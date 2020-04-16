<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once 'vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();

$entityManager = $entityManagerFactory->getEntityManager();

$idStudent = $argv[1];
$idCourse = $argv[2];

/** @var $course */
$course = $entityManager->find(Course::class, $idCourse);


/** @var $student */
$student = $entityManager->find(Student::class, $idStudent);

$course->addStudent($student);

$entityManager->flush();
