<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController {


    /**
     * @Route("/", name = "clinic_accueil")
     */
    public function connexion() {
        return $this->render("/accueil/accueilConnexion.html.twig");
    }
    /**
     * @Route("/dashboard", name= "clinic_dashboard")
     */
    public function index() {
        return $this->render("/accueil/dashboard.html.twig");
    }
}