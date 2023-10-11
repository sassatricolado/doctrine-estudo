<?php

require_once 'vendor/autoload.php';

$entityManager = \Samuel\Doctrine\Helper\EntityManagerCreator::createEntityManager();

var_dump($entityManager);