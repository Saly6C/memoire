<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SouscriptionType;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/souscription", name="security_souscription")
     */
    public function souscription(Request $request, ManagerRegistry $manager, UserPasswordEncoderInterface $encoder)
    {
        
        //on créé l'objet user qu'on va lier à notre formulaire
        $user = new User();
        //ici on intancie notre formulaire 
        $form = $this->createForm(SouscriptionType::class,$user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())  {
            $hashpdw = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($hashpdw);
            $stat= $user->getStatus();

            if($stat == true) {
                $user->setStatus('actif');
            }else {
                $user->setStatus('inactif');
            }

            $mr =  $manager->getManager();
            $mr->persist($user);
            $mr->flush();
            return $this->redirectToRoute('clinic_login');
        }
        return $this->render('security/souscription.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/login", name="clinic_login")
     */
    public function login(AuthenticationUtils $auth) {
        
        $utilisateur = $auth->getLastUsername();
        $error = $auth->getLastAuthenticationError();
        return $this->render('security/login.html.twig', [
            'error' => $error,
            'user' =>$utilisateur
        ]);
    }

    /**
     * @Route("/logout", name= "clinic_logout")
     */
    public function logout() {

    }
}
