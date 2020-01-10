<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\PatientType;
use App\Entity\Consultation;
use App\Entity\Hospitalisation;
use Doctrine\ORM\EntityManager;
use App\Repository\UserRepository;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ConsultationRepository;
use App\Repository\HospitalisationRepository;
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
    public function index(EntityManagerInterface $em, HospitalisationRepository $hr, ConsultationRepository $consultationRepository, UserRepository $compteActif): Response { 
        // $nbrConsultation = $consultationRepository->
        // $query = $em->createQuery('SELECT IDENTITY(c.personnel),COUNT(c.id) as nombre  FROM app\Entity\Consultation c GROUP BY c.personnel');
        // $nbr = $query->getResult();

        // Nombre total de consultation par service
        $query = $em->createQuery('SELECT COUNT(c.id) as nbrConsultation, p.nomPersonnel, s.nomService 
                                    FROM app\Entity\Consultation c 
                                    INNER JOIN app\Entity\Personnel p
                                    INNER JOIN app\Entity\Service s
                                    WHERE c.personnel = p.id 
                                    AND s.id = p.service
                                    GROUP BY s.nomService '    
                                );
        $nbr = $query->getResult();

        // Nombre total d'hospitalisations par mois
        $req = $em->createQuery("SELECT COUNT(h.id) as nbrHospitalisation, MONTH(h.dateHospitalisation) as mois
                                    FROM app\Entity\Hospitalisation h
                                    GROUP BY mois"
                                );
        $month = $req->getResult();

        // Nombre total de patients
        $reqPatient = $em->createQuery("SELECT COUNT(p.id) as totalPatient
                                    FROM app\Entity\Patient p"
                                );
        $totalPatient = $reqPatient->getResult();
        
        // Nombre total de chambres
        $reqChambre = $em->createQuery("SELECT COUNT(ch.id) as totalChambre
                                    FROM app\Entity\Chambre ch"
                                );
        $totalChambre = $reqChambre->getResult();
        
        return $this->render("/accueil/dashboard.html.twig", [
            'lastConsultation' => $consultationRepository->findBy(array(), ['dateConsultation' => 'desc'] , 3, null),
            'compteActif' => $compteActif->findBy(['status' => 'actif'],null,5, null),
            'consultationParService' => $nbr,
            'hospitalisationParMois' => $month,
            'totalPatient' =>  $totalPatient,
            'totalChambre' =>  $totalChambre
            ]);
    }

    
}