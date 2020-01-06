<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\PatientType;
use App\Repository\UserRepository;
use App\Repository\PatientRepository;
use App\Repository\ConsultationRepository;
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
    public function index(ConsultationRepository $consultationRepository, UserRepository $compteActif): Response { 
        return $this->render("/accueil/dashboard.html.twig", [
            'lastConsultation' => $consultationRepository->findBy(array(), ['dateConsultation' => 'desc'] , 5, null),
            'compteActif' => $compteActif->findBy(['status' => 'actif'],null,5, null)
            ]);
    }

    
}