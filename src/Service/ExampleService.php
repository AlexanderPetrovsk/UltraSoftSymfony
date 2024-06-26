<?php

namespace App\Service;

use App\Entity\UserForm;
use App\Form\UserFormType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;

class ExampleService
{
    private $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function createUserForm(Request $request): Form
    {
        $userForm = new UserForm();

        $form = $this->formFactory->create(UserFormType::class, $userForm);

        return $form->handleRequest($request);
    }
}