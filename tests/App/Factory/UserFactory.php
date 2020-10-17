<?php

namespace Tests\App\Factory;

use Gricob\FunctionalTestBundle\Factory\AbstractEntityFactory;
use Tests\App\Entity\User;

class UserFactory extends AbstractEntityFactory
{
    public function getDefinition(): array
    {
        return [
            'id' => rand(1, 10),
            'username' => 'test-username'
        ];
    }

    public function getEntityClass(): string
    {
        return User::class;
    }
}
