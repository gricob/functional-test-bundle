<?php

namespace Tests\App\Factory\State;

use Gricob\FunctionalTestBundle\Factory\State;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
class PublishedState extends State
{
    public function __construct()
    {
        parent::__construct('published', [
            'published' => true,
        ]);
    }
}
