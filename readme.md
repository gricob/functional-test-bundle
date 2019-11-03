[![CircleCI](https://circleci.com/gh/gricob/functional-test-bundle/tree/master.svg?style=svg)](https://circleci.com/gh/gricob/functional-test-bundle/tree/master)
[![CodeFactor](https://www.codefactor.io/repository/github/gricob/functional-test-bundle/badge)](https://www.codefactor.io/repository/github/gricob/functional-test-bundle)

## Introduction

This Bundle provides base classes for functional tests on Symfony

### Installation

```bash
composer require --dev gricob/functional-test-bundle
```

### Example

```php
use Gricob\FunctionalTestBundle\Testing\FunctionalTestCase as TestCase;

class FunctionalTestCase extends TestCase
{
    public function testGetRequest()
    {
        $response = $this->get('/home');
        
        $response
            ->assertOk()
            ->assertSee('Welcome to functional testing!');
    }
}
```

## Documentation

Check the documentation on the [wiki](https://github.com/gricob/functional-test-bundle/wiki) 


## Inspiration

The assertions are inspired on [Laravel testing](https://laravel.com/docs/master/testing) assertions. 
