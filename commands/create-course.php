<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once 'vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$course = new Course();
$course->setName($argv[1]);

$entityManager->persist($course);
$entityManager->flush();
