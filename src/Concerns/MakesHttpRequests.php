<?php

namespace Gricob\SymfonyWebTestBundle\Concerns;

use Symfony\Component\BrowserKit\Client;
use Symfony\Component\BrowserKit\Cookie;
use Gricob\SymfonyWebTestBundle\Testing\TestResponse;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\User\UserInterface;

trait MakesHttpRequests
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var bool
     */
    protected $followRedirects = false;

    /**
     * @var array
     */
    protected $firewallLogins = [];

    /**
     * @var bool
     */
    protected $catchExceptions = false;

    protected function get(string $uri, array $queryParameters = []): TestResponse
    {
        return $this->request('GET', $uri, $queryParameters);
    }

    protected function post(string $uri, $parameters = []): TestResponse
    {
        return $this->request('POST', $uri, $parameters);
    }

    protected function request(string $method, string $uri, array $parameters = []): TestResponse
    {
        if(!$this->client) {
            $this->initClient();
        }

        $this->client->catchExceptions($this->catchExceptions);

        $crawler = $this->client->request($method, $uri, $parameters);

        $response = TestResponse::fromBaseResponse($this->client->getResponse(), $crawler);

        $this->catchExceptions = false;

        if($this->followRedirects) {
            $response = $this->followRedirects($response);
        }

        return $response;
    }

    protected function followingRedirects(): self
    {
        $this->followRedirects = true;

        return $this;
    }

    protected function followRedirects(TestResponse $response): TestResponse
    {
        while($response->isRedirect()) {
            $response = $this->get($response->headers->get('Location'));
        }

        $this->followRedirects = false;

        return $response;
    }

    protected function loginAs(UserInterface $user, string $firewall = 'secured_area'): self
    {
        $this->firewallLogins[$firewall] = $user;

        return $this;
    }

    protected function catchExceptions(): self
    {
        $this->catchExceptions = true;

        return $this;
    }

    protected function initClient()
    {
        $this->client = static::createClient($this->getKernelOptions());

        if($this->firewallLogins) {
            $options = $this->client->getContainer()->getParameter('session.storage.options');

            if (!$options || !isset($options['name'])) {
                throw new \InvalidArgumentException('Missing session.storage.options#name');
            }

            $session = $this->client->getContainer()->get('session');
            $session->setId(uniqid());

            $this->client->getCookieJar()->set(new Cookie($options['name'], $session->getId()));

            /** @var $user UserInterface */
            foreach ($this->firewallLogins as $firewallName => $user) {
                $token = $this->createUserToken($user, $firewallName);
                $tokenStorage = $this->client->getContainer()->get('security.token_storage');
                $tokenStorage->setToken($token);
                $session->set('_security_' . $firewallName, serialize($token));
            }

            $session->save();
        }
    }

    protected function createUserToken(UserInterface $user, string $firewallName): TokenInterface
    {
        return new UsernamePasswordToken(
            $user,
            null,
            $firewallName,
            $user->getRoles()
        );
    }

    abstract protected function getKernelOptions(): array;
}