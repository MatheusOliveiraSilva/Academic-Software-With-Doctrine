<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;
use Alura\Doctrine\Repository\StudentRepository;
require_once 'vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentsRepository = $entityManager->getRepository(Student::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);


/** @var Student[] $students */
$students = $studentsRepository->searchCoursesByStudent(); 
/** @var Student[] $students */
$students = $studentsRepository->findAll(); 

foreach ($students as $student) {
    $phones = $student->getPhones()
        ->map(function (Phone $phone) {
            return $phone->getNumber();
	})
	->toArray();

    echo "ID: {$student->getId()}\n";
    echo "Name: {$student->getName()}\n";
    echo "Phones: " . implode(", ", $phones) . "\n";
    $courses = $student->getCourses();

    foreach ($courses as $course) {
        echo "Course ID: {$course->getId()}\n";
        echo "\tCourse: {$course->getName()}";
	echo "\n";

    }
        
    echo "\n";
}

print_r($debugStack);
