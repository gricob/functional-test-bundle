<?php

namespace Gricob\FunctionalTestBundle\Concerns;

use Gricob\FunctionalTestBundle\Testing\TestResponse;
use Symfony\Component\BrowserKit\Client;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\DomCrawler\Link;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
        if (!$this->client) {
            $this->initClient();
        }

        $files = [];
        foreach ($parameters as $key => $parameter) {
            if ($parameter instanceof UploadedFile) {
                $files[$key] = $parameter;

                unset($parameters[$key]);
            }
        }

        $this->client->catchExceptions($this->catchExceptions);
        $this->client->followRedirects($this->followRedirects);

        $crawler = $this->client->request($method, $uri, $parameters, $files);

        $this->catchExceptions = false;
        $this->followRedirects = false;

        return TestResponse::fromBaseResponse($this->client->getResponse())
            ->setCrawler($crawler)
            ->setContainer($this->getContainer());
    }

    protected function followRedirect()
    {
        $crawler = $this->client->followRedirect();

        return TestResponse::fromBaseResponse($this->client->getResponse())
            ->setCrawler($crawler)
            ->setContainer($this->getContainer());
    }

    protected function submit(Form $form, array $values = []): TestResponse
    {
        $form->setValues($values);

        return $this->request($form->getMethod(), $form->getUri(), $form->getPhpValues(), $form->getPhpFiles());
    }

    protected function click(Link $link): TestResponse
    {
        return $this->request($link->getMethod(), $link->getUri());
    }

    protected function followingRedirects(): self
    {
        $this->followRedirects = true;

        return $this;
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

        if ($this->firewallLogins) {
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
