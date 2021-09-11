<?php

namespace Tests\Functional\Factory;

use Gricob\FunctionalTestBundle\Concerns\CreatesObjects;
use Gricob\FunctionalTestBundle\Concerns\InteractsWithDatabase;
use Gricob\FunctionalTestBundle\Testing\RefreshDatabase;
use Tests\App\Entity\Article;
use Tests\Functional\TestCase;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
class CreateEntityTest extends TestCase
{
    use InteractsWithDatabase;
    use RefreshDatabase;
    use CreatesObjects;

    public function testCanCreateEntity()
    {
        $this->create(Article::class);

        $this->assertDatabaseHas(Article::class, [
            'id' => 1,
            'title' => 'Fake article',
            'pinned' => false,
            'published' => false
        ]);
    }

    public function testCanCreateEntityOverridingAttributes()
    {
        $this->create(Article::class, ['title' => 'Overridden title']);

        $this->assertDatabaseHas(Article::class, [
            'id' => 1,
            'title' => 'Overridden title',
            'pinned' => false,
            'published' => false,
        ]);
    }

    public function testCanCreateEntityWithState()
    {
        $this->create(Article::class, [], 'pinned');

        $this->assertDatabaseHas(Article::class, [
            'id' => 1,
            'title' => 'Fake article',
            'pinned' => true,
            'published' => false,
        ]);
    }

    public function testCanCreateEntityWithGlobalState()
    {
        $this->create(Article::class, [], 'published');

        $this->assertDatabaseHas(Article::class, [
            'id' => 1,
            'title' => 'Fake article',
            'pinned' => false,
            'published' => true,
        ]);
    }

    public function testCanCreateEntityWithMultipleStates()
    {
        $this->create(Article::class, [], ['pinned', 'published']);

        $this->assertDatabaseHas(Article::class, [
            'id' => 1,
            'title' => 'Fake article',
            'pinned' => true,
            'published' => true,
        ]);
    }

    public function testCanCreateMultipleEntities()
    {
        $this->create(Article::class, [], [], 2);

        $this->assertDatabaseHas(Article::class, ['id' => 1]);
        $this->assertDatabaseHas(Article::class, ['id' => 2]);
    }
}
