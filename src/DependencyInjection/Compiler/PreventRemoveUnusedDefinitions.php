<?php

namespace Gricob\FunctionalTestBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class PreventRemoveUnusedDefinitions implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$unusedDefinitions = $container->getParameter('functional_test.unused_definitions')) {
            return;
        }

        foreach ($container->getAliases() + $container->getDefinitions() as $id => $definition) {
            if (in_array($id, $unusedDefinitions)) {
                $definition->setPublic(true);
            }
        }
    }
}
