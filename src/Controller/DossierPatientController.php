<?php

namespace App\Controller;

use App\Entity\DossierPatient;
use App\Form\DossierPatientType;
use App\Repository\DossierPatientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("dashboard/dossier/patient")
 */
class DossierPatientController extends AbstractController
{
    /**
     * @Route("/", name="dossier_patient_index", methods={"GET"})
     */
    public function index(DossierPatientRepository $dossierPatientRepository): Response
    {
        return $this->render('dossier_patient/index.html.twig', [
            'dossier_patients' => $dossierPatientRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dossier_patient_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dossierPatient = new DossierPatient();
        $form = $this->createForm(DossierPatientType::class, $dossierPatient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dossierPatient);
            $entityManager->flush();
            $this->addFlash('success', 'Dossier patient enregistré avec succès!');

            return $this->redirectToRoute('dossier_patient_index');
        }

        return $this->render('dossier_patient/new.html.twig', [
            'dossier_patient' => $dossierPatient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dossier_patient_show", methods={"GET"})
     */
    public function show(DossierPatient $dossierPatient): Response
    {
        return $this->render('dossier_patient/show.html.twig', [
            'dossier_patient' => $dossierPatient,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dossier_patient_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DossierPatient $dossierPatient): Response
    {
        $form = $this->createForm(DossierPatientType::class, $dossierPatient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Dossier patient modifier avec succès!');

            return $this->redirectToRoute('dossier_patient_index');
        }

        return $this->render('dossier_patient/edit.html.twig', [
            'dossier_patient' => $dossierPatient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dossier_patient_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DossierPatient $dossierPatient): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dossierPatient->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dossierPatient);
            $entityManager->flush();
            $this->addFlash('success', 'Dossier patient supprimé avec succès!');

        }

        return $this->redirectToRoute('dossier_patient_index');
    }
}
