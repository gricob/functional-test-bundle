<?php

namespace Tests;

use Exception;
use Gricob\FunctionalTestBundle\Concerns\CreatesObjects;
use Gricob\FunctionalTestBundle\Enums\VerbosityLevel;
use Gricob\FunctionalTestBundle\Testing\RefreshDatabase;
use Gricob\FunctionalTestBundle\Testing\FunctionalTestCase;
use Gricob\FunctionalTestBundle\Testing\TestResponse;
use PHPUnit\Framework\AssertionFailedError;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Tests\App\AppKernel;
use Tests\App\DataFixtures\LoadUserData;
use Tests\App\Entity\User;
use Tests\App\Services\UnusedService;

class FunctionalTestCaseTest extends FunctionalTestCase
{
    use RefreshDatabase;
    use CreatesObjects;

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
            'q' => 'Test post param',
            'file' => $this->getTestFile()
        ])
            ->assertOk()
            ->assertSee('Test post param | test.txt');
    }

    public function testGetJsonRequest()
    {
        $this->getJson('/get-json', [
            'name' => 'John'
        ])->assertSee('Your name is John');
    }

    public function testPostJsonRequest()
    {
        $this->postJson('/post-json', [
            'name' => 'John'
        ])->assertSee('Your name is John');
    }

    public function testFormSubmit()
    {
        $response = $this->get('/form');

        $form = $response->getCrawler()->filter('form')->form();

        $form['form[title]']->setValue('Test article');
        $form['form[attachment]']->upload($this->getTestFile());

        $response = $this->submit($form);

        $this->assertInstanceOf(TestResponse::class, $response);
        $response->assertSeeAll([
            'Test article',
            'test.txt'
        ]);
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

    public function testWithHeaders()
    {
        $this->withHeaders([
            'referer' => '/foo/bar'
        ])->get('/headers')
            ->assertSee('referer|/foo/bar');
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

        $this->setVerbosityLevel(VerbosityLevel::quiet())->runCommand('test:command', ['shouldFail'])->assertOk();
    }

    public function testAssertViewIs()
    {
        $this->get('/view')->assertViewIs('test.html.twig');
    }

    public function testAssertViewIsFails()
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Actual view [test.html.twig] does not match expected view [other-view.html.twig]');

        $this->get('/view')->assertViewIs('other-view.html.twig');
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

    public function testContainerCannotGetUnusedServiceWhenUsingPreventRemoveUnusedDefinitions()
    {
        $this->expectException(ServiceNotFoundException::class);
        $this->expectExceptionMessage(
            'The "test.unused_private_service" service or alias has been removed or inlined when the container was compiled.'.
            ' You should either make it public, or stop using the container directly and use dependency injection instead.'
        );

        $container = $this->setEnvironment('test')->getContainer();

        $this->assertInstanceOf(UnusedService::class, $container->get('test.unused_private_service'));
    }

    public function testContainerCanGetUnusedServiceWhenUsingPreventRemoveUnusedDefinitions()
    {
        $this->setEnvironment('prevent_remove_unused_definitions');

        $container = $this->getContainer();

        $this->assertInstanceOf(UnusedService::class, $container->get('test.unused_private_service'));
    }

    private function getTestFile()
    {
        return new UploadedFile(
            __DIR__.'/uploads/test.txt',
            'test.txt',
            'text/plain',
            null
        );
    }
}
