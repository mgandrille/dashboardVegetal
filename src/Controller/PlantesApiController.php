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
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/api")
 */

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
     * @Route("/plantes", name="api_plantes")
     */
    public function index(PlantesRepository $plantesrepository){
        // Find all plants and return Json
        $plantes = $plantesrepository->findAll();

        $data = $this->serializer->normalize($plantes, null, ['groups' => 'all_plantes']);

        return new JsonResponse($data);
    
    }

    /**
     * @Route("/plantes/search")
     */
     public function search(Request $request, PlantesRepository $plantesrepository){
        // Search with GET parameters, init with $request if exists, empty if not

        ($request->query->get('name')) ? $name = $request->query->get('name') : $name = '';

        // Create search query with string, empty string if user don't search with search bar
        $result = $plantesrepository->createQueryBuilder('p')
                                    ->where('p.name LIKE :name OR p.species LIKE :name')
                                    ->setParameter('name', '%'.$name.'%');

        if($request->query->get('watering')){
            // If search with watering filter
            if($request->query->get('watering') !== ''){
                // If not empty
                $watering = intval($request->query->get('watering'));
                $result->andWhere('p.watering = :watering')->setParameter('watering', $watering);
            }
        }

        if($request->query->get('type')){
            // If search with type filter
            if($request->query->get('type') !== ''){
                // If not empty
                $type = intval($request->query->get('type'));
                $resutl->andWhere('p.type = :type')->setParameter('type', $type);
            }
        }

        if($request->query->get('difficulty')){
            // If search with difficulty filter
            if($request->query->get('difficulty') !== ''){
                // If not empty
                $difficulty = intval($request->query->get('difficulty'));
                $result->andWhere('p.difficulty = :difficulty')->setParameter('difficulty', $difficulty);
            }
        }

        if($request->query->get('sunshine')){
            // If search with sunshine filter
            if($request->query->get('difficulty') !== ''){
                // If not empty
                $sunshine = intval($request->query->get('sunshine'));
                $result->andWhere('p.sunshine = :sunshine')->setParameter('sunshine', $sunshine);
            }
        }

        $searchResult = $result->getQuery()->getResult();

        $data = $this->serializer->normalize($searchResult, null, ['groups' => 'all_plantes']);

        // Convert Json (search return an array)
        $response = new Response(json_encode($data));
        // application json for the return Json
        $response->headers->set('Content-Type', 'application/json');

        return $response;

     }

    /**
     * @Route("/plantes/{id}")
     */
    public function findOne(Plantes $plante){
        // Find one plant with id and return Json
        $data = $this->serializer->normalize($plante, null, ['groups'   => 'all_plantes']);

        return new JsonResponse($data);
    }
}