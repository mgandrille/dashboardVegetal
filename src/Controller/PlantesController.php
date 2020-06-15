<?php

namespace App\Controller;

use App\Entity\Plantes;
use App\Form\PlantesType;
use App\Repository\PlantesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use App\Service\FileUploader;
use App\Repository\DashboardRepository;

/**
 * @Route("/plantes")
 */
class PlantesController extends AbstractController
{

    /**
     * @Route("/index/admin", name="plantes_index", methods={"GET"})
     */
    public function index(PlantesRepository $plantesRepository, DashboardRepository $dashboardrepository): Response
    {

        return $this->render('plantes/index.html.twig', [
            'plantes' => $plantesRepository->findAll(),
        ]);


    }

    /**
     * @Route("/new/admin", name="plantes_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger, FileUploader $fileUploader): Response
    {
        $plante = new Plantes();
        $form = $this->createForm(PlantesType::class, $plante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $pictureFile = $form['picture']->getData();

            if ($pictureFile) {
                $pictureFileName = $fileUploader->upload($pictureFile);
                $plante->setPicture($pictureFileName);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($plante);
            $entityManager->flush();

            return $this->redirectToRoute('plantes_index');
        }

        return $this->render('plantes/new.html.twig', [
            'plante' => $plante,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="plantes_show", methods={"GET"})
     */
    public function show(Plantes $plante): Response
    {
        return $this->render('plantes/show.html.twig',[
            'plante'    => $plante
        ]);
    }

    /**
     * @Route("/{id}/edit/admin", name="plantes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Plantes $plante): Response
    {
        $form = $this->createForm(PlantesType::class, $plante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('plantes_index');
        }

        return $this->render('plantes/edit.html.twig', [
            'plante' => $plante,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/admin", name="plantes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Plantes $plante): Response
    {
        if ($this->isCsrfTokenValid('delete'.$plante->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($plante);
            $entityManager->flush();
        }

        return $this->redirectToRoute('plantes_index');
    }
    
}
