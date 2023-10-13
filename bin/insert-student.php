<?php

use Samuel\Doctrine\Entity\Phone;
use Samuel\Doctrine\Entity\Student;
use Samuel\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student('Aluno com telefones');
$student->addPhone(new Phone('(21) 99999 - 9999'));
$student->addPhone(new Phone('(20) 44444 - 4444'));

$entityManager->persist($student);
$entityManager->flush();