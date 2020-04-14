<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once 'vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    echo "ID: {$student->getId()} \nName: {$student->getName()} \n\n";
}

$edi = $studentRepository->find(11);
echo "ID: {$edi->getId()} \nName: {$edi->getName()} \n\n";

$matt = $studentRepository->findOneBy([
    'name' => 'Matthew Oliver'
]);

echo "ID: {$matt->getId()} \nName: {$matt->getName()} \n\n ";
