<?php

namespace Tests\App\Factory;

use Gricob\FunctionalTestBundle\Factory\AbstractEntityFactory;
use Gricob\FunctionalTestBundle\Factory\State;
use Tests\App\Entity\Article;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
class ArticleFactory extends AbstractEntityFactory
{
    public function getEntityClass(): string
    {
        return Article::class;
    }

    public function getDefinition(): array
    {
        return [
            'title' => 'Fake article',
            'published' => false,
        ];
    }

    public function getStates(): array
    {
        return [
            new State('pinned', [
                'pinned' => true,
            ]),
        ];
    }
}
