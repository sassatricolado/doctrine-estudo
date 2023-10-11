<?php

use Samuel\Doctrine\Entity\Student;
use Samuel\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $students */
$students = $studentRepository->findAll();

foreach($students as $student) {
    echo "ID: $student->id\nNome: $student->name\n\n";
}

echo $studentRepository->count([]);