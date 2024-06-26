<?php

namespace App\Controller;

use App\Entity\UserForm;
use App\Form\UserFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
    public function hello(): Response
    {
        $userForm = new UserForm();

        $form = $this->createForm(UserFormType::class, $userForm);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('front/submitted-form.html.twig' []);
        }

        return $this->render('front/form.html.twig', [
            'form' => $form,
        ]);
    }
}