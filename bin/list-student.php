<?php

use Samuel\Doctrine\Entity\Course;
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

    if($student->getPhones()->count() > 0) {
        echo PHP_EOL;
        echo "Telefones: ";

        echo implode(', ', $student->getPhones()
            ->map(fn (Phone $phone) => $phone->number)
            ->toArray());    
    }

    if($student->getCourses()->count() > 0) {
        echo PHP_EOL;
        echo "Cursos: ";

        echo implode(', ', $student->getCourses()
            ->map(fn (Course $course) => $course->name)
            ->toArray());
    }

    echo PHP_EOL . PHP_EOL;
}

echo $studentRepository->count([]) . PHP_EOL;