<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="clinic_login")
     */
    public function login(AuthenticationUtils $auth)
    {
        // get the login error if there is one
        $error = $auth->getLastAuthenticationError();
        // last username entered by the user
        // $lastUsername = $auth->getLastUsername();
        return $this->render('security/login.html.twig', [
            // 'last_name' => $lastUsername,
            'error' => $error
        ]);
    }
}
