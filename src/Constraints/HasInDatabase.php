<?php

namespace Gricob\FunctionalTestBundle\Constraints;

use Doctrine\Common\Persistence\ObjectManager;
use PHPUnit\Framework\Constraint\Constraint;

class HasInDatabase extends Constraint
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(ObjectManager $em, array $data)
    {
        $this->data = $data;
        $this->em = $em;
    }

    public function matches($entityClass)
    {
        return !empty($this->em->getRepository($entityClass)->findBy($this->data));
    }

    public function failureDescription($entityClass): string
    {
        return sprintf(
            "a row of [%s] table matches the attributes %s.",
            $entityClass,
            $this->toString()
        );
    }

    public function toString()
    {
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }
}
