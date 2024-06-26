<?php

namespace App\Controller;

use App\Entity\UserForm;
use App\Form\UserFormType;
use App\Entity\ExampleEntity;
use App\Service\ExampleService;
use Symfony\Component\Form\FormInterface;
use App\Repository\ExampleEntityRepository;
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
            return $this->render('success-form.html.twig');
        }

        return $this->render('form.html.twig', [
            'form' => $form,
        ]);
    }

    public function create(): Response
    {
        $entity = $this->exampleService->create();

        $dtoEntity = (array) $entity;

        return $this->json(['data' => $entity]);
    }

    public function patch(Request $request, ?ExampleEntity $exampleEntity = null): Response
    {
        if (!$exampleEntity) {
            throw $this->createNotFoundException('The product does not exist');
        }
        
        $content = json_decode($request->getContent(), true);

        $entity = $this->exampleService->patch($content);

        $dtoEntity = (array) $entity;

        return $this->json(['data' => $entity]);

    }

    public function delete(?ExampleEntity $exampleEntity = null): Response
    {
        if (!$exampleEntity) {
            throw $this->createNotFoundException('The product does not exist');
        }

        $this->exampleService->delete($exampleEntity);

        return $this->json([]);

    }

    public function get(): Response
    {
        $entites = $this->exampleService->get();

        return $this->json([
            $entites
        ]);
    }
}