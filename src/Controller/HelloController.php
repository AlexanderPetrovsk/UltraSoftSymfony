<?php

namespace App\Controller;

use App\Entity\UserForm;
use App\Form\UserFormType;
use App\Service\ExampleService;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
    private $exampleService;

    public function __construct(ExampleService $exampleService)
    {
        $this->exampleService = $exampleService;
    }

    public function hello(Request $request): Response
    {
        $form = $this->exampleService->createUserForm($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('submitted-form.html.twig' []);
        }

        return $this->render('form.html.twig', [
            'form' => $form,
        ]);
    }
}