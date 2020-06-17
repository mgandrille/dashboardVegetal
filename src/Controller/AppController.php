<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlantesRepository;


class AppController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(PlantesRepository $plantesRepository){
        return $this->render('homepage.html.twig');
    }

    /**
     * @Route("/admin", name="app_admin")
     */
    public function indexAdmin(){
        return $this->render('admin.html.twig');
    }
}