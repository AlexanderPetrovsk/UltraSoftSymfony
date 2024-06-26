<?php

namespace App\Controller;

use App\Entity\UserForm;
use App\Form\UserFormType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
    private $exampleService;

    public function __construct(FormFactory $exampleService)
    {
        $this->exampleService = $exampleService;
    }

    public function hello(): Response
    {
        $form = $this->exampleService->createForm();

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('front/submitted-form.html.twig' []);
        }

        return $this->render('front/form.html.twig', [
            'form' => $form,
        ]);
    }
}