<?php

namespace Gricob\FunctionalTestBundle\Factory\Interfaces;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
interface StateInterface
{
    public function getName(): string;

    public function getDefinition(): array;
}
