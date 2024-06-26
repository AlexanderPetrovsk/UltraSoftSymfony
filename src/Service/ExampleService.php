<?php

namespace App\Service;

use App\Entity\UserForm;
use App\Form\UserFormType;
use App\Entity\ExampleEntity;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;

class ExampleService
{
    private $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
        $this->exampleRepository = $exampleEntityRepository;
    }

    public function createUserForm(Request $request): Form
    {
        $userForm = new UserForm();

        $form = $this->formFactory->create(UserFormType::class, $userForm);

        return $form->handleRequest($request);
    }

    public function create(): ExampleEntity
    {
        $entity = new ExampleEntity();
        $entity
            ->setId(1)
            ->setName('Alex')
            ->setLastName('Petrov')
            ->setEmail('aleksandar@email.com');

        $this->exampleRepository->save($entity);
    }

    public function patch(ExampleEntity $exampleEntity, array $data): ExampleEntity
    {
        $exampleEntity
            ->setId($data['id'])
            ->setName($data['name'])
            ->setLastName($data['lastName'])
            ->setEmail($data['email']);

        $this->exampleRepository->save($entity);
    }

    public function delete(ExampleEntity $exampleEntity): void
    {
        $this->exampleRepository->delete($exampleEntity);
    }

    public function get(): array
    {
        return $this->exampleRepository->get();
    }
}