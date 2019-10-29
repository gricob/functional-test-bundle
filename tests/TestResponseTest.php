<?php

namespace Tests;

use Gricob\FunctionalTestBundle\Testing\TestResponse;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;
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
        $this->expectExceptionMessage("Response status code [500] does not match expected 200 status code.");

        TestResponse::fromBaseResponse(Response::create('', 500))->assertOk();
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
        $this->expectExceptionMessage("Response redirect location does not match expected [/other-redirect] location");

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

    public function testAssertExactJson()
    {
        TestResponse::fromBaseResponse(Response::create(
            json_encode([
                'key1' => 'Key 1',
                'key2' => [
                    10,
                    30
                ]
            ])))
            ->assertExactJson([
                'key2' => [
                    30,
                    10
                ],
                'key1' => 'Key 1'
            ]);
    }

    public function testGetCrawler()
    {
        $testResponse = TestResponse::fromBaseResponse(Response::create(''), new Crawler());

        $this->assertInstanceOf(Crawler::class, $testResponse->getCrawler());
    }

    public function testGetContent()
    {
        $testResponse = TestResponse::fromBaseResponse(Response::create('Test content'));

        $this->assertEquals('Test content', $testResponse->getContent());
    }
}