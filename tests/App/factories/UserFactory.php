<?php
use League\FactoryMuffin\FactoryMuffin;
use Tests\App\Entity\User;

/** @var FactoryMuffin $fm */
$fm->define(User::class)->setDefinitions([
    'id' => rand(1,10),
    'username' => 'test-username'
]);