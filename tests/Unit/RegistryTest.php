<?php

namespace Tests\Unit;

use Gricob\FunctionalTestBundle\Exceptions\FactoryNotFoundException;
use Gricob\FunctionalTestBundle\Factory\Registry;
use PHPUnit\Framework\TestCase;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
class RegistryTest extends TestCase
{
    public function testThrowExceptionOnNonRegisteredFactory()
    {
        $this->expectException(FactoryNotFoundException::class);

        (new Registry())->getFactory('UnregisteredFactory');
    }
}
