<?php

use Samuel\Doctrine\Entity\Phone;
use Samuel\Doctrine\Entity\Student;
use Samuel\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $students */
$students = $studentRepository->findAll();

foreach($students as $student) {
    echo "ID: $student->id\nNome: $student->name\n\n";
    echo "Telefones:\n";
    implode(', ', $student->getPhones()
        ->map(fn (Phone $phone) => $phone->number)
        ->toArray());

    foreach($student->getPhones() as $phone) {
        echo $phone->number . PHP_EOL;
    }

    echo PHP_EOL . PHP_EOL;
}

echo $studentRepository->count([]);