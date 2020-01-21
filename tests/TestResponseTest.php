<?php

namespace Tests;

use Gricob\FunctionalTestBundle\Testing\TestResponse;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class TestResponseTest extends TestCase
{
    public function testAssertOk()
    {
        TestResponse::fromBaseResponse(Response::create('', 200))->assertOk();
    }

    public function testAssertOkFails()
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Response status code [500] does not match expected 200 status code.');

        TestResponse::fromBaseResponse(Response::create('', 500))->assertOk();
    }

    public function testAssertInstanceOfTrue()
    {
        TestResponse::fromBaseResponse(JsonResponse::create('', 200))->assertInstanceOf(Response::class);
    }

    public function testAssertInstanceOfFalse()
    {
        $this->expectException(ExpectationFailedException::class);
        $this->expectExceptionMessage(
            sprintf(
                'Failed asserting that %s Object (...) is an instance of class "%s".',
                Response::class,
                JsonResponse::class
            )
        );
        TestResponse::fromBaseResponse(Response::create('', 200))->assertInstanceOf(JsonResponse::class);
    }

    public function testAssertRedirectWithExpectedLocation()
    {
        TestResponse::fromBaseResponse(RedirectResponse::create('/test-redirect'))
            ->assertRedirect('/test-redirect');
    }

    public function testAssertRedirectWithoutExpectedLocation()
    {
        TestResponse::fromBaseResponse(RedirectResponse::create('/test-redirect'))
            ->assertRedirect();
    }

    public function testAssertRedirectFails()
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Response redirect location does not match expected [/other-redirect] location');

        TestResponse::fromBaseResponse(RedirectResponse::create('/test-redirect'))
            ->assertRedirect('/other-redirect');
    }

    public function testAssertNotFound()
    {
        TestResponse::fromBaseResponse(Response::create('', 404))
            ->assertNotFound();
    }

    public function testAssertForbidden()
    {
        TestResponse::fromBaseResponse(Response::create('', 403))
            ->assertForbidden();
    }

    public function testAssertUnauthorized()
    {
        TestResponse::fromBaseResponse(Response::create('', 401))
            ->assertUnauthorized();
    }

    public function testAssertSee()
    {
        TestResponse::fromBaseResponse(Response::create('Test text in response'))
            ->assertSee('text in')
            ->assertDontSee('text not in');
    }

    public function testAssertSeeAll()
    {
        TestResponse::fromBaseResponse(Response::create('Test text in response'))
            ->assertSeeAll([
                'text',
                'response',
            ]);
    }

    public function testAssertSeeAllFails()
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage("Failed asserting that 'Test text in response' contains \"this does not exists\"");

        TestResponse::fromBaseResponse(Response::create('Test text in response'))
            ->assertSeeAll([
                'text',
                'this does not exists',
            ]);
    }

    public function testAssertDontSeeAny()
    {
        TestResponse::fromBaseResponse(Response::create('Test text in response'))
            ->assertDontSeeAny([
                'this does not exists',
                'this one neither',
            ]);
    }

    public function testAssertDontSeeAnyFails()
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage("Failed asserting that 'Test text in response' does not contain \"text\"");

        TestResponse::fromBaseResponse(Response::create('Test text in response'))
            ->assertDontSeeAny([
                'text',
                'this does not exists',
            ]);
    }

    public function testAssertExactJson()
    {
        TestResponse::fromBaseResponse(Response::create(
            json_encode([
                'key1' => 'Key 1',
                'key2' => [
                    10,
                    30,
                ],
            ])))
            ->assertExactJson([
                'key2' => [
                    30,
                    10,
                ],
                'key1' => 'Key 1',
            ]);
    }

    public function testGetCrawler()
    {
        $testResponse = TestResponse::fromBaseResponse(Response::create(''))->setCrawler(new Crawler());

        $this->assertInstanceOf(Crawler::class, $testResponse->getCrawler());
    }

    public function testGetContent()
    {
        $testResponse = TestResponse::fromBaseResponse(Response::create('Test content'));

        $this->assertEquals('Test content', $testResponse->getContent());
    }
}
