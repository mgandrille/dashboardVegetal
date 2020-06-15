<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\DashboardRepository;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class DashboardApiController extends AbstractController
{
    private $serializer;

    public function __construct(){

        $classMetedataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer($classMetedataFactory)];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/api/dashboards")
     */
    public function allDashboard(DashboardRepository $dashboardRepository){
        //Return all Dashboards in Json
        $dash = $dashboardRepository->findAll();

        $data = $this->serializer->normalize($dash, null, ['groups' => 'dashboard', 'all_plantes']);

        return new JsonResponse($data);
    }

    /**
     * @Route("/api/bigdash", name="api_bigdash")
     */
    public function findBigDash(DashboardRepository $dashboardRepository){
        // Find two biggers dashboard in db
        $dash = $dashboardRepository->findBigger();

        $dashArray = array();
        
        for($i=0; $i<count($dash); $i++){
            // browse $dash (array) for find the ID of two biggers dashboards
            $findDash = $dashboardRepository->findBy([
                //find the dashboard with ID
                'id'    => $dash[$i]['id']
            ]);
            // Pull the Dashboard (object) in array
            $dashArray[] = $findDash;
        }
        
        // normalize the array of objects $dashArray
        $data = $this->serializer->normalize($dashArray, null, ['groups'    => 'dashboard', 'all_plantes']);

        // return a normalize $dashArray in Json
        return new JsonResponse($data);
    }
}