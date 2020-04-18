<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once 'vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentsRepository = $entityManager->getRepository(Student::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

$classStudent = Student::class;
$dql = "SELECT student, phones, courses FROM $classStudent student JOIN student.phones phones JOIN student.courses courses";
$query = $entityManager->createQuery($dql);

/** @var Student [] $students */
$students = $query->getResult();

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
