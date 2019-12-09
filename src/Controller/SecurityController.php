<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController {

    /**
     * @Route("/login", name="clinic_login")
     */
    public function login(Request $request, AuthenticationUtils $auth) {
        // get the login error if there is one
        $error = $auth->getLastAuthenticationError();

        var_dump($error);
        // last username entered by the user
        $lastUsername = $auth->getLastUsername();
        var_dump($lastUsername);
        return $this->render('security/login.html.twig', array(
            'lastUsername' => $lastUsername,
            'error' => $error
        ));

        
    }
}