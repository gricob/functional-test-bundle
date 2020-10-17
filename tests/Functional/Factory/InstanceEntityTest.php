<?php

namespace Tests\Functional\Factory;

use Gricob\FunctionalTestBundle\Concerns\CreatesObjects;
use Gricob\FunctionalTestBundle\Testing\RefreshDatabase;
use Tests\App\Entity\Article;
use Tests\Functional\TestCase;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
class InstanceEntityTest extends TestCase
{
    use CreatesObjects;

    public function testCanInstantiateEntity()
    {
        $article = $this->instance(Article::class);

        $this->assertInstanceOf(Article::class, $article);
        $this->assertNull($article->getId());
        $this->assertEquals('Fake article', $article->getTitle());
        $this->assertFalse($article->isPinned());
        $this->assertFalse($article->isPublished());
    }

    public function testCanInstantiateEntityOverridingAttributes()
    {
        $article = $this->instance(Article::class, ['title' => 'Overridden title']);

        $this->assertInstanceOf(Article::class, $article);
        $this->assertNull($article->getId());
        $this->assertEquals('Overridden title', $article->getTitle());
        $this->assertFalse($article->isPinned());
        $this->assertFalse($article->isPublished());
    }

    public function testCanCreateEntityWithState()
    {
        $article = $this->instance(Article::class, [], 'pinned');

        $this->assertInstanceOf(Article::class, $article);
        $this->assertNull($article->getId());
        $this->assertEquals('Fake article', $article->getTitle());
        $this->assertTrue($article->isPinned());
        $this->assertFalse($article->isPublished());
    }

    public function testCanCreateEntityWithGlobalState()
    {
        $article = $this->instance(Article::class, [], 'published');

        $this->assertInstanceOf(Article::class, $article);
        $this->assertNull($article->getId());
        $this->assertEquals('Fake article', $article->getTitle());
        $this->assertFalse($article->isPinned());
        $this->assertTrue($article->isPublished());
    }

    public function testCanCreateEntityWithMultipleStates()
    {
        $article = $this->instance(Article::class, [], ['pinned', 'published']);

        $this->assertInstanceOf(Article::class, $article);
        $this->assertNull($article->getId());
        $this->assertEquals('Fake article', $article->getTitle());
        $this->assertTrue($article->isPinned());
        $this->assertTrue($article->isPublished());
    }

    public function testCanCreateMultipleEntities()
    {
        $articles = $this->instance(Article::class, [], [], 2);

        $this->assertCount(2, $articles);
        foreach ($articles as $article) {
            $this->assertInstanceOf(Article::class, $article);
            $this->assertNull($article->getId());
            $this->assertEquals('Fake article', $article->getTitle());
            $this->assertFalse($article->isPublished());
        }
    }
}
