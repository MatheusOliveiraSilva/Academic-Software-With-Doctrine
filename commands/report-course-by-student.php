<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Courses;
use Doctrine\DBAL\Logging\DebugStack;
use Alura\Doctrine\Helper\EntityManagerFactory;
require_once 'vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentsRepository = $entityManager->getRepository(Student::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);
/** @var Studend[] $students */
$students = $studentsRepository->findAll();

foreach ($students as $student) {
    $phones = $student
        ->getPhones()
	->map(function (Phone $phone) {
            return $phone->getNumber();        
    })
    ->toArray();
    
    echo "ID: {$student->getId()} \n";
    echo "Name: {$student->getName()} \n";
    echo "Phones: " . implode(", " , $phones);
    echo "\n";
    $courses = $student->getCourses();

    foreach ($courses as $course) {
        echo "\tCourse ID: {$course->getId()} \n";
	echo "\tCourse: {$course->getName()}\n";
	echo "\n";
    }

    echo "\n";
}

print_r($debugStack);
