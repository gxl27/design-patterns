<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        // the pattern list it's in the twig global variable as a service
        // so nothing to pass into the view

        return $this->render('home/index.html.twig', [

        ]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function home(): Response
    {
        return $this->redirectToRoute('homepage');
    }

}
