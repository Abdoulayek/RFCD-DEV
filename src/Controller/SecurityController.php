<?php

namespace App\Controller;

use App\Entity\Stagiaire;
use App\Entity\Certif;
use App\Entity\Certifi;
use App\Form\StagiaireFormType;
use App\Form\ContactFormType;
use Symfony\Component\Mime\Email;
use App\Form\CertifFormeType;
use App\Form\CertifType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Mailer\MailerInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/connexion", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/deconnexion", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/account", name="app_account")
     */
    public function account(): Response
    {
        return $this->render('main/account.html.twig');
    }

    #[Route('/stagiaire', name: 'app_stagiaire')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        $stagiaire = new Stagiaire();
        $form = $this->createForm(StagiaireFormType::class, $stagiaire);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            $entityManager->persist($stagiaire);
            $entityManager->flush();
        }
  
        return $this->render('stagiaire/index.html.twig', [
            'stagiaireForm' => $form -> createView(),
        ]);
    }

    #[Route('/liste', name: 'app_liste')]

    public function action(ManagerRegistry $doctrine): Response
    {

    $liste = $doctrine->getRepository(Stagiaire::class)->findAll();
    

    return $this->render('stagiaire/show.html.twig', [
        'liste' => $liste
    ]);

}   


#[Route('/certif', name: 'app_certif')]
public function certif(Request $request, EntityManagerInterface $entityManager): Response
{

    $stagiaire = new Certif();
    $form = $this->createForm(CertifFormeType::class, $stagiaire);
    $form->handleRequest($request);
    if ($form->isSubmitted())
    {
        $entityManager->persist($stagiaire);
        $entityManager->flush();
    }

    return $this->render('certif/index.html.twig', [
        'certifForm' => $form -> createView(),
    ]);
}

#[Route('/lscertif', name: 'app_list')]

public function actionf(ManagerRegistry $doctrine): Response
{

$liste = $doctrine->getRepository(Certif::class)->findAll();


return $this->render('certif/show.html.twig', [
    'liste' => $liste
]);

}


#[Route('/certificateur', name: 'app_certificateur')]
public function certificateur(Request $request, EntityManagerInterface $entityManager): Response
{

    $stagiaire = new Certifi();
    $form = $this->createForm(CertifType::class, $stagiaire);
    $form->handleRequest($request);
    if ($form->isSubmitted())
    {
        $entityManager->persist($stagiaire);
        $entityManager->flush();
    }

    return $this->render('certif/certif.html.twig', [
        'certifForm' => $form -> createView(),
    ]);
}

#[Route('/listcertif', name: 'app_listcertif')]

public function listef(ManagerRegistry $doctrine): Response
{

$liste = $doctrine->getRepository(Certifi::class)->findAll();


return $this->render('certif/shw.html.twig', [
    'liste' => $liste
]);

}

/**
     * @Route("/contact", name="app_contact")
     */
    public function contact(Request $request, MailerInterface $mailer)
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            
            $message = (new Email())
                ->from($contactFormData['nom'])
                ->to('abdoulayekante863@gmail.com')
                ->subject('Choix Certificateur de ' .$contactFormData['nom'])
                ->text( $contactFormData['formateur'],
                    'text/plain');
            $mailer->send($message);
            $this->addFlash('success', 'Votre choix a été pris en compte');
            return $this->redirectToRoute('contact');
        }
        return $this->render('certif/contact.html.twig', [
            'our_form' => $form->createView()
        ]);
    }



     /**
     * @Route("/connex", name="app_connex")
     */
    public function connex(AuthenticationUtils $authenticationUtils): Response
    {
    // if ($this->getUser()) {
      //   return $this->redirectToRoute('app_profile');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/log.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }


     /**
     * @Route("/profile", name="app_profile")
     */
    public function profile(): Response
    {


        return $this->render('certif/fic.html.twig', [
           
        ]);
       
    }
   


}