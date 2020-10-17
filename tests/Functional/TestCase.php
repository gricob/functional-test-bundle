<?php

namespace Tests\Functional;

use Gricob\FunctionalTestBundle\Testing\FunctionalTestCase;
use Tests\App\AppKernel;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
class TestCase extends FunctionalTestCase
{
    protected static function getKernelClass()
    {
        return AppKernel::class;
    }
}
