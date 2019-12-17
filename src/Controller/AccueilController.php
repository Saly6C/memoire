<?php

namespace App\Controller;


use App\Form\PatientType;
use App\Repository\PatientRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
     * @Route("/dashboard")
     */
class AccueilController extends AbstractController {


    // /**
    //  * @Route("/", name = "clinic_accueil")
    //  */
    // public function connexion() {
    //     return $this->render("/accueil/accueilConnexion.html.twig");
    // }
    /**
     * @Route("/", name= "clinic_dashboard")
     */
    public function index() { 
        return $this->render("/accueil/dashboard.html.twig");
    }

    
}