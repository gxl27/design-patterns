<?php

namespace App\Controller;

use App\Entity\Flyweight\Map;
use App\Entity\Flyweight\MapGenerator;

use App\Form\FlyweightType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FlyweightController extends AbstractController
{
    /**
     * @Route("/flyweight", name="flyweight", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $size = "";
        $map = NULL;

        $form = $this->createForm(FlyweightType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $size = $form->get('size')->getData();
            $towns = $form->get('towns')->getData();
            $density = $form->get('density')->getData();
            $guards = $form->get('guards')->getData();

            $mapGenerator = new MapGenerator($size, $towns, $density, $guards);
            $map = $mapGenerator->generate();
            
            // $creator->create($form->get('vehicle')->getData());
        }

     

        return $this->render('flyweight/index.html.twig', [
            'form' => $form->createView(),
            'map' => $map,
            'x' => $size,
        ]);
    }
}
