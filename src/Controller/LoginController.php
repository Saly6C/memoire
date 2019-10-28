<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LoginController extends AbstractController{

    /**
     * @Route("/login", name="login_clinique")
     */
    public function login() {
        return $this->render("login.html.twig");
    }
}