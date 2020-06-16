<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ArrosedRepository;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;



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

        return new Response(200);
    }
}