<?php

use Samuel\Doctrine\Entity\Course;
use Samuel\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$course = new Course('Doctrine');

$entityManager->persist($course);
$entityManager->flush();