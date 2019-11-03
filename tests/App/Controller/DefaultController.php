<?php

namespace Tests\App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function getAction(Request $request)
    {
        return new Response($request->query->get('q', 'Query not provided'));
    }

    public function postAction(Request $request)
    {
        return new Response($request->get('q'));
    }

    public function redirectAction(Request $request)
    {
        return new RedirectResponse('/get-uri');
    }

    public function userAction()
    {
        return new Response();
    }

    public function exceptionAction()
    {
        throw new \Exception('Something went wrong!');
    }

    public function viewAction()
    {
        return $this->render('test.twig.html');
    }
}