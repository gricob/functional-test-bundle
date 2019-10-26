[![CircleCI](https://circleci.com/gh/gricob/symfony-webtest-bundle.svg?style=svg)](https://circleci.com/gh/gricob/symfony-webtest-bundle)

## Introduction

This Bundle provides base classes for functional tests on Symfony

### Installation

```bash
composer require --dev gricob/symfony-webtest-bundle
```


### Usage

#### Add bundle to TestKernel

```php
public function registerBundles()
{
    return [
        // ...
        new SymfonyWebTestBundle(),
    ];
}
```

#### Extend the WebTestCase

```php
use Gricob\SymfonyWebTestBundle\Testing\WebTestCase;

class WebTestCaseTest extends WebTestCase
{
    //
}
```


## Using the container

```php
$service = $this->getContainer()->get('desired.service');
$parameter = $this->getContainer()->getParameter('desired.parameter');
```

## Making HTTP Requests

### Request with GET method

```php
$response = $this->get('/uri');
```

### Request with POST method

```php
$response = $this->post('/uri');
```

### Request with logged user

```php
$this->loadFixtures([LoadUserData::class]);

$user = $this->getReference(LoadUserData::USER);

$response = $this->loginAs($user)->get('/uri');

```

### Getting the Crawler
```php
$crawler = $response->getCrawler();
```

### Response assertions

```php
$response->assertOk();
$response->assertNotFound();
$response->assertForbidden();
$response->assertUnauthorized();
$response->assertSee('Assert that response content has this text');
$response->assertDontSee('Assert that response content does not have this text');
```

## Interacting with database

### Loading fixtures

```php
$this->loadFixtures([LoadUserData::class]);

$user = $this->getReference(LoadUserData::USER);
```

### Refreshing the database

In order to refresh database just use RefreshDatabase trait. 
This trait will create the database schema on test setUp and purge it on tearDown.

```php

use Gricob\SymfonyWebTestBundle\Testing\RefreshDatabase;

class FunctionalTest extends WebTestCase
{
  use RefreshDatabase;
}
```