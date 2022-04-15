<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/')]
class AppController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function homepage(): Response
    {
        return $this->render('app/homepage.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[Route('/manager/homepage', name: 'homepage_manager')]
    public function homepageManager(): Response
    {
        return $this->render('app/homepage_manager.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[Route('/manager/admin', name: 'homepage_manager')]
    #[IsGranted('ROLE_ADMIN')]
    public function adminManager(): Response
    {
        return $this->render('app/homepage_manager.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

}
