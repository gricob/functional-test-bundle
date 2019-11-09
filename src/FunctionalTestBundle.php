<?php

namespace Gricob\FunctionalTestBundle;

use Gricob\FunctionalTestBundle\DependencyInjection\Compiler\PreventRemoveUnusedDefinitions;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class FunctionalTestBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new PreventRemoveUnusedDefinitions(), PassConfig::TYPE_BEFORE_REMOVING, -200);
    }
}