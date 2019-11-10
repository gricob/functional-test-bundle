<?php

namespace Tests\App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Tests\App\Entity\Article;

class DefaultController extends AbstractController
{
    public function getAction(Request $request)
    {
        return new Response($request->query->get('q', 'Query not provided'));
    }

    public function postAction(Request $request)
    {
        $file = $request->files->get('file');

        return new Response($request->get('q').' | '.$file->getFilename());
    }

    public function submitForm(Request $request)
    {
        $article = new Article();

        $form = $this->createFormBuilder($article)
            ->add('title', TextType::class)
            ->add('attachment', FileType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {
            $article = $form->getData();

            return $this->render('form_success.html.twig', [
                'article' => $article,
                'attachment' => $article->getAttachment()->getClientOriginalName()
            ]);
        }

        return $this->render('form.html.twig', [
            'form' => $form->createView()
        ]);
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
        return $this->render('test.html.twig');
    }

    public function headers(Request $request)
    {
        $html = '<ul>';
        foreach ($request->headers as $header => $value) {
            $html .= '<li>'.$header.'|'.$value[0].'</li>';
        }
        $html .= '</ul>';

        return new Response($html);
    }
}