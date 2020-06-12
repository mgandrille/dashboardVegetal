<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlantesRepository;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Plantes;

class PlantesApiController extends AbstractController
{
    private $serializer;

    public function __construct() {

        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer($classMetadataFactory)];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/api/plantes", name="api_plantes")
     */
    public function index(PlantesRepository $plantesrepository){

        $plantes = $plantesrepository->findAll();

        $data = $this->serializer->normalize($plantes, null, ['groups' => 'all_plantes']);

        return new JsonResponse($data);
    
    }

    /**
     * @Route("/api/plantes/{id}")
     */
    public function findOne(Plantes $plante){
        // Find one plant with id and return Json

        $data = $this->serializer->normalize($plante, null, ['groups'   => 'all_plantes']);
        return new JsonResponse($data);
    }

}