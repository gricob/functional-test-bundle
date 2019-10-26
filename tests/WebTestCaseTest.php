<?php

namespace Tests;

use Tests\App\AppKernel;
use Tests\App\DataFixtures\LoadUserData;
use Symfony\Component\DependencyInjection\Container;
use Gricob\SymfonyWebTestBundle\Testing\WebTestCase;
use Gricob\SymfonyWebTestBundle\Testing\RefreshDatabase;

class WebTestCaseTest extends WebTestCase
{
    use RefreshDatabase;

    protected static function getKernelClass()
    {
        return AppKernel::class;
    }

    public function testGetRequest()
    {
        $this->get('/get-uri', [
            'q' => 'Test query param'
        ])
            ->assertOk()
            ->assertSee('Test query param');
    }

    public function testPostRequest()
    {
        $this->post('/post-uri', [
            'q' => 'Test post param'
        ])
            ->assertOk()
            ->assertSee('Test post param');
    }

    public function testRedirect()
    {
        $this->get('/redirect-uri')->assertRedirect('/get-uri');
    }

    public function testFollowingRedirects()
    {
        $this->followingRedirects()->get('/redirect-uri')
            ->assertOk()
            ->assertSee('Query not provided');
    }

    public function testNotFound()
    {
        $this->catchExceptions()->get('/not-found-uri')->assertNotFound();
    }

    public function testUnauthorized()
    {
        $this->catchExceptions()->get('/user')->assertUnauthorized();
    }

    public function testLogin()
    {
        $this->loadFixtures([LoadUserData::class]);

        $user = $this->getReference('user');

        $this->loginAs($user)->get('/user')->assertOk();
    }

    public function testRequestWithoutExceptionHandling()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Something went wrong!');

        $this->get('/exception');
    }

    public function testRequestWithExceptionHandling()
    {
        $this->catchExceptions()->get('/exception')->assertStatusCode(500);
    }

    public function testGetContainer()
    {
        $container = $this->getContainer();

        $this->assertInstanceOf(Container::class, $container);
        $this->assertEquals('test', $container->get('kernel')->getEnvironment());
    }
}