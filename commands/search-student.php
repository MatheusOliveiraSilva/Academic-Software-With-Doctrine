<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once 'vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    $phones = $student
       ->getPhones()
       ->map(function (Phone $phone) {
            return $phone->getNumber();
       })
       ->toArray();
    echo "ID: {$student->getId()} \nName: {$student->getName()} \n\n";
    echo "Phones: " . implode(',', $phones);

    echo "\n\n";
}

