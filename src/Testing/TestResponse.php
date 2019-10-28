<?php

namespace Gricob\SymfonyWebTestBundle\Testing;

use Gricob\SymfonyWebTestBundle\Support\Arr;
use PHPUnit\Framework\Assert as PHPUnit;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;

class TestResponse
{
    /**
     * @var Response
     */
    private $baseResponse;

    /**
     * @var ?Crawler
     */
    private $crawler;

    /**
     * TestResponse constructor.
     * @param Response $baseResponse
     * @param Crawler $crawler
     */
    protected function __construct(Response $baseResponse, Crawler $crawler = null)
    {
        $this->baseResponse = $baseResponse;
        $this->crawler = $crawler;
    }

    public static function fromBaseResponse(Response $baseResponse, Crawler $crawler = null)
    {
        return new static($baseResponse, $crawler);
    }

    /**
     * @return Crawler|null Crawler
     */
    public function getCrawler(): ?Crawler
    {
        return $this->crawler;
    }

    public function assertOk(): self
    {
        return $this->assertStatusCode(Response::HTTP_OK);
    }

    public function assertRedirect($expectedLocation = null): self
    {
        PHPUnit::assertTrue(
            $this->baseResponse->isRedirect($expectedLocation),
            $expectedLocation
                ? "Response redirect location does not match expected [$expectedLocation] location."
                : 'Response is not a redirect.'
        );

        return $this;
    }

    public function assertNotFound(): self
    {
        return $this->assertStatusCode(Response::HTTP_NOT_FOUND);
    }

    public function assertForbidden(): self
    {
        return $this->assertStatusCode(Response::HTTP_FORBIDDEN);
    }

    public function assertUnauthorized(): self
    {
        return $this->assertStatusCode(Response::HTTP_UNAUTHORIZED);
    }

    public function assertStatusCode($expectedStatusCode): self
    {
        $statusCode = $this->baseResponse->getStatusCode();

        PHPUnit::assertEquals(
            $expectedStatusCode,
            $statusCode,
            "Response status code [$statusCode] does not match expected $expectedStatusCode status code."
        );

        return $this;
    }

    public function assertSee(string $needle): self
    {
        PHPUnit::assertStringContainsString($needle, $this->baseResponse->getContent());

        return $this;
    }

    public function assertDontSee(string $needle): self
    {
        PHPUnit::assertStringNotContainsString($needle, $this->baseResponse->getContent());

        return $this;
    }

    public function assertExactJson(array $data): self
    {
        $actual = json_encode(Arr::sortRecursive(
            (array)$this->decodeResponseJson()
        ));

        PHPUnit::assertEquals(json_encode(Arr::sortRecursive($data)), $actual);

        return $this;
    }

    public function decodeResponseJson(bool $assoc = true)
    {
        return json_decode($this->baseResponse->getContent(), $assoc);
    }

    public function __get($name)
    {
        return $this->baseResponse->{$name};
    }

    public function __call($method, $arguments)
    {
        return $this->baseResponse->{$method}(...$arguments);
    }
}