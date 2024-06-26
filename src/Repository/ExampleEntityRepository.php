<?php

namespace App\Repository;

use App\Entity\ExampleEntity;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class ExampleEntityRepository extends ServiceEntityRepository
{
    private $entityManager;
    private $exampleRepository;

    public function __construct(ManagerRegistry $registry, ExampleEntityRepository $exampleEntityRepository)
    {
        parent::__construct($registry, Product::class);
        $this->exampleRepository = $exampleEntityRepository;
    }

    public function save(ExampleEntity $exampleEntity): ExampleEntity
    {
        $entityManager = $this->getEntityManager();

        $entityManager->persist($product);
        $entityManager->flush();

        return $exampleEntity;
    }


    public function delete(ExampleEntity $exampleEntity): void
    {
        $entityManager = $this->getEntityManager();

        $entityManager->remove($exampleEntity);

        $entityManager->flush();
    }

    public function get(): array
    {
        $entityManager = $this->getEntityManager();

        return $entities = $entityManager->findAll();
    }
}