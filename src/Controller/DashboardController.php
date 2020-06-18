<?php

namespace App\Controller;

use App\Entity\Dashboard;
use App\Form\DashboardType;
use App\Repository\DashboardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlantesRepository;
use App\Entity\Arrosed;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/dashboard")
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("/admin", name="dashboard_index", methods={"GET"})
     * IsGranted("ROLE_ADMIN")
     */
    public function index(DashboardRepository $dashboardRepository): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'dashboards' => $dashboardRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/admin", name="dashboard_new", methods={"GET","POST"})
     * IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $dashboard = new Dashboard();
        $form = $this->createForm(DashboardType::class, $dashboard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dashboard);
            $entityManager->flush();

            return $this->redirectToRoute('dashboard_index');
        }

        return $this->render('dashboard/new.html.twig', [
            'dashboard' => $dashboard,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/admin", name="dashboard_show", methods={"GET"})
     * IsGranted("ROLE_ADMIN")
     */
    public function show(Dashboard $dashboard): Response
    {
        return $this->render('dashboard/show.html.twig', [
            'dashboard' => $dashboard,
        ]);
    }

    /**
     * @Route("/{id}/edit/admin", name="dashboard_edit", methods={"GET","POST"})
     * IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Dashboard $dashboard): Response
    {
        $form = $this->createForm(DashboardType::class, $dashboard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dashboard_index');
        }

        return $this->render('dashboard/edit.html.twig', [
            'dashboard' => $dashboard,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/add/{id}/{plante_id}", name="dashboard_add")
     */
    public function addPlante(Request $request, DashboardRepository $dashboardRepository, PlantesRepository $planteRepository, $id, $plante_id){
        // Add one plant in dashboard, parameters = GET for ID dashboardand plant ID

        if($this->getUser()->getDashboard()->getId() == $id){

            // Find plante with ID for add into dashboard
            $newPlante = $planteRepository->find($plante_id);
            // Find dashboard with ID
            $dashboard = $dashboardRepository->find($id);
                        
            $dashboard->addPlante($newPlante);
            // Init arrosage with actual Datetime (in construct Arrosed)
            $newArrosed = new Arrosed($newPlante, $dashboard);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newArrosed);
            $entityManager->flush();
            
            return new Response('', Response::HTTP_CREATED);

        }else{

            return $this->render('fail/joker.html.twig', [
                'joker'     => 'joker.gif'
            ]);
        }
    }

    /**
     * @Route("/remove/{id}/{plante_id}")
     */
    public function removePlante(Request $request, DashboardRepository $dashboardRepository, PlantesRepository $planteRepository, $id, $plante_id){

        if($this->getUser()->getDashboard()->getId() == $id){
            // Find plante with ID for add into dashboard
            $planteToDelete = $planteRepository->find($plante_id);
            // Find dashboard with ID
            $dashboard = $dashboardRepository->find($id);

            $dashboard->removePlante($planteToDelete);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dashboard);
            $entityManager->flush();

            return new Response('', Response::HTTP_CREATED);

        }else{

            return $this->render('fail/joker.html.twig', [
                'joker'     => 'joker.gif'
            ]);
        }
    }

    /**
     * @Route("/{id}/admin", name="dashboard_delete", methods={"DELETE"})
     * IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Dashboard $dashboard): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dashboard->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dashboard);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dashboard_index');
    }

}
