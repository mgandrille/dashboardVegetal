<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ArrosedRepository;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Plantes;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\PlantesRepository;
use App\Repository\DashboardRepository;



/**
 * @Route("/arrosed")
 * @Security("is_granted('ROLE_USER')", statusCode=401, message="Not authenticated.")
 */
class ArrosedController extends AbstractController
{
    /**
     * @Route("/change", methods={"POST"})
     */
    public function changeArrosed(ArrosedRepository $arrosedRepository)
    {    
        $dashId = $request->request->get('dashboard');
        $planteId = $request->request->get('plante');

        $newArrosed = $arrosedRepository->findTheGood($dashId, $planteId);

        $newArrosed->setArrosedAt(new \DateTime());

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($newArrosed);
        $entityManager->flush();

        return new Response('', Response::HTTP_CREATED);
    }

    /**
     * @Route("/isarrosed/{id}/{plante_id}")
     */
    public function isArrosed(  PlantesRepository $planteRepository, 
                                DashboardRepository $dashboardRepository,
                                ArrosedRepository $arrosedRepository,
                                Request $request)
    {
        $planteToArrose = $planteRepository->find($plante_id);
        $dashboardToUpdate = $dashboardRepository->find($id);

        $arrosedToUpdate = $arrosedRepository->findTheGood($id, $plante_id);

        $arrosedToUpdate->setArrosedAt(new \DateTime());

        return new Response('', Response::HTTP_CREATED);
    }
}