<?php

use App\Entity\UserForm;
use App\Form\UserFormType;
use Symfony\Component\Form\FormFactory;

class ExampleService
{
    private $formFactory;

    public function __construct(FormFactory $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function createUserForm(): FormInterface
    {
        $userForm = new UserForm();

        $form = $this->formFactory->createForm(UserFormType::class, $userForm);

        return $form->handleRequest($request);
    }
}