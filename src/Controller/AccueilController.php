<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\PatientType;
use App\Entity\Consultation;
use Doctrine\ORM\EntityManager;
use App\Repository\UserRepository;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;
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
    public function index(EntityManagerInterface $em, ConsultationRepository $consultationRepository, UserRepository $compteActif): Response { 
        // $nbrConsultation = $consultationRepository->
        // $query = $em->createQuery('SELECT IDENTITY(c.personnel),COUNT(c.id) as nombre  FROM app\Entity\Consultation c GROUP BY c.personnel');
        // $nbr = $query->getResult();

        $query = $em->createQuery('SELECT COUNT(c.id) as nbrConsultation, p.nomPersonnel, s.nomService 
                                    FROM app\Entity\Consultation c 
                                    INNER JOIN app\Entity\Personnel p
                                    INNER JOIN app\Entity\Service s
                                    WHERE c.personnel = p.id 
                                    AND s.id = p.service
                                    GROUP BY s.nomService ');
        $nbr = $query->getResult();
        
        return $this->render("/accueil/dashboard.html.twig", [
            'lastConsultation' => $consultationRepository->findBy(array(), ['dateConsultation' => 'desc'] , 5, null),
            'compteActif' => $compteActif->findBy(['status' => 'actif'],null,5, null),
            'consultationParService' => $nbr
            ]);
    }

    
}