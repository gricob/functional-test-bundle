<?php

namespace Tests;

use Exception;
use Gricob\FunctionalTestBundle\Testing\RefreshDatabase;
use Gricob\FunctionalTestBundle\Testing\FunctionalTestCase;
use OutOfBoundsException;
use PHPUnit\Framework\AssertionFailedError;
use Symfony\Bundle\FrameworkBundle\Test\TestContainer;
use Symfony\Component\DependencyInjection\Container;
use Tests\App\AppKernel;
use Tests\App\DataFixtures\LoadUserData;
use Tests\App\Entity\User;

class FunctionalTestCaseTest extends FunctionalTestCase
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
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Something went wrong!');

        $this->get('/exception');
    }

    public function testRequestWithExceptionHandling()
    {
        $this->catchExceptions()->get('/exception')->assertStatusCode(500);
    }

    public function testRunCommand()
    {
        $this->runCommand('test:command')
            ->assertOk()
            ->assertSee('Hello from test:command');
    }

    public function testRunCommandWithInputs()
    {
        $this->runCommand('test:command', ['shouldAsk'], ['testing'])
            ->assertOk()
            ->assertSee('You are testing');
    }

    public function testRunCommandFails()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Test command failed');

        $this->runCommand('test:command', ['shouldFail'])->assertOk();
    }

    public function testInvalidVerbosityThrowException()
    {
        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessage('The verbosity level [13] is invalid. 
                Use VerbosityLevel class constants to prevent invalid verbosity level');

        $this->setVerbosityLevel(13);
    }

    public function testAssertViewIs()
    {
        $this->get('/view')->assertViewIs('test.twig.html');
    }

    public function testAssertViewIsFails()
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Actual view [test.twig.html] does not match expected view [other-view.twig.html]');

        $this->get('/view')->assertViewIs('other-view.twig.html');
    }

    public function testAssertDatabaseHas()
    {
        $this->loadFixtures([LoadUserData::class]);

        $this->assertDatabaseHas(User::class, [
            'username' => 'john'
        ]);
    }

    public function testAssertDatabaseHasFails()
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage("Failed asserting that a row of [Tests\App\Entity\User] table matches the attributes {\n    \"username\": \"john\"\n}..");

        $this->assertDatabaseHas(User::class, [
            'username' => 'john'
        ]);
    }

    public function testAssertDatabaseMissing()
    {
        $this->loadFixtures([LoadUserData::class]);

        $this->assertDatabaseMissing(User::class, [
            'username' => 'jim'
        ]);
    }

    public function testAssertDatabaseMissingFails()
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage("Failed asserting that a row of [Tests\App\Entity\User] table does not match the attributes {\n    \"username\": \"john\"\n}..");

        $this->loadFixtures([LoadUserData::class]);

        $this->assertDatabaseMissing(User::class, [
            'username' => 'john'
        ]);
    }

    public function testGetContainer()
    {
        $container = $this->getContainer();

        $this->assertInstanceOf(Container::class, $container);
        $this->assertEquals('test', $container->get('kernel')->getEnvironment());
    }

    public function testGetTestContainer()
    {
        $container = $this->getTestContainer();

        $this->assertInstanceOf(TestContainer::class, $container);
    }
}