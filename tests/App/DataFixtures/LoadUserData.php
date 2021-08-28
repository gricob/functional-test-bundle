<?php

namespace Tests\App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Tests\App\Entity\User;

class LoadUserData extends Fixture
{
    const USER = 'user';

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setId(1);
        $user->setUsername('john');

        $manager->persist($user);
        $manager->flush();

        $this->setReference(self::USER, $user);
    }
}
