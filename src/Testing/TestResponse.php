<?php

namespace Gricob\FunctionalTestBundle\Testing;

use Illuminate\Support\Arr;
use PHPUnit\Framework\Assert as PHPUnit;
use Symfony\Bridge\Twig\DataCollector\TwigDataCollector;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Profiler\Profile;

/**
 * @mixin Response
 */
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
     * @var Container
     */
    private $container;

    /**
     * TestResponse constructor.
     *
     * @param Response $baseResponse
     */
    protected function __construct(Response $baseResponse)
    {
        $this->baseResponse = $baseResponse;
    }

    public static function fromBaseResponse(Response $baseResponse)
    {
        return new static($baseResponse);
    }

    /**
     * @return Crawler|null
     */
    public function getCrawler(): ?Crawler
    {
        return $this->crawler;
    }

    /**
     * @param Crawler $crawler
     *
     * @return TestResponse
     */
    public function setCrawler(Crawler $crawler): self
    {
        $this->crawler = $crawler;

        return $this;
    }

    public function assertOk(): self
    {
        return $this->assertStatusCode(Response::HTTP_OK);
    }

    public function assertRedirect($expectedLocation = null): self
    {
        $actualLocation = $this->baseResponse->headers->get('Location');

        PHPUnit::assertTrue(
            $this->baseResponse->isRedirect($expectedLocation),
            $actualLocation
                ? "Response redirect location [$actualLocation] does not match expected [$expectedLocation] location."
                : 'Response is not a redirect.'
        );

        return $this;
    }

    public function assertInstanceOf(string $expectedClass)
    {
        PHPUnit::assertInstanceOf(
            $expectedClass,
            $this->baseResponse
        );
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
        PHPUnit::assertContains($needle, $this->baseResponse->getContent());

        return $this;
    }

    public function assertSeeAll(array $needles): self
    {
        foreach ($needles as $needle) {
            PHPUnit::assertContains($needle, $this->baseResponse->getContent());
        }

        return $this;
    }

    public function assertDontSee(string $needle): self
    {
        PHPUnit::assertNotContains($needle, $this->baseResponse->getContent());

        return $this;
    }

    public function assertDontSeeAny(array $needles)
    {
        foreach ($needles as $needle) {
            PHPUnit::assertNotContains($needle, $this->baseResponse->getContent());
        }

        return $this;
    }

    public function assertExactJson(array $data): self
    {
        $actual = json_encode(Arr::sortRecursive(
            (array) $this->decodeResponseJson()
        ));

        PHPUnit::assertEquals(json_encode(Arr::sortRecursive($data)), $actual);

        return $this;
    }

    public function decodeResponseJson(bool $assoc = true)
    {
        return json_decode($this->baseResponse->getContent(), $assoc);
    }

    public function assertViewIs(string $expectedView)
    {
        $collector = $this->getTwigCollector();

        $template = array_key_first($collector->getTemplates());

        PHPUnit::assertEquals(
            $expectedView,
            $template,
            "Actual view [$template] does not match expected view [$expectedView]"
        );
    }

    protected function getTwigCollector(): TwigDataCollector
    {
        if (!$this->getProfile()->hasCollector('twig')) {
            PHPUnit::fail('Unable to get twig data collector.');
        }

        return $this->getProfile()->getCollector('twig');
    }

    protected function getProfile(): Profile
    {
        if (!$this->getContainer()->has('profiler')) {
            PHPUnit::fail('Profiler is not initialized.');
        }

        $profiler = $this->getContainer()->get('profiler');

        return $profiler->loadProfileFromResponse($this->baseResponse);
    }

    /**
     * @return Container|null
     */
    public function getContainer(): ?Container
    {
        return $this->container;
    }

    /**
     * @param Container $container
     *
     * @return TestResponse
     */
    public function setContainer(Container $container): self
    {
        $this->container = $container;

        return $this;
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
