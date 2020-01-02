<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MailController extends AbstractController
{
  
     /**
     * @Route("/forgetPWD/send", name="send")
     */
    public function sendMail( \Swift_Mailer $mailer, Request $request)
    {
        $email = $request->get('email');

        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('cliniquetawfekh@gmail.com')
            ->setTo($email)
            ->setBody(
                $this->renderView(
                    // templates/emails/registration.html.twig
                    'emails/recuperation.html.twig',
                ),
                'text/html'
            )
        ;

        $mailer->send($message);
        
        $this->addFlash('forget_password','Verifiez votre boite de messagerie, un message vous a été envoyé');
        return $this->redirectToRoute("clinic_login");
    }

    /**
     * @Route("/forgetPWD", name="forgetPWD")
     */
    public function forgetPassword(Request $request) {  

        return $this->render("security/forget_password.html.twig");

    }

    /**
     * @Route("/renew", name="renew_password")
     */
    public function renewPassword() {
        return $this->render("security/renew_password.html.twig");
    }

    /**
     * @Route("/renew/test", name="renew_password_test")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder,ManagerRegistry $entityManager) {
        $email = $request->get('email'); 
        $password = $request->get('password');
        $confirmPassword = $request->get('confirm_password');

        // $query = $userRepository->findOneBy(['email' => $email]);
        
        $query = $this->getDoctrine()->getManager();
        $query = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        

        if (!$query) {
            // throw $this->createNotFoundException(
            $this->addFlash('error','l\'adresse mail n\'exist pas');
            return $this->redirectToRoute('renew_password');
    
        } elseif ($password <> $confirmPassword){
            $this->addFlash('error','mots de passe non identiques ');
            return $this->redirectToRoute('renew_password');
        }
        
        $pwd = $encoder->encodePassword($query, $password);
        $query->setPassword($pwd);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('clinic_login');
    }

}
