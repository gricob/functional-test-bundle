<?php

namespace Gricob\FunctionalTestBundle\Exceptions;

use Throwable;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
class FactoryNotFoundException extends \Exception
{
    public function __construct(string $entityClass)
    {
        parent::__construct("Unable to found factory for entity [$entityClass]");
    }
}
