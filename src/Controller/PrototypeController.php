<?php

namespace App\Controller;

use App\Entity\Prototype\Vehicle;

use App\Form\PrototypeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PrototypeController extends AbstractController
{
    /**
     * @Route("/prototype", name="prototype", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";
        $vehicle = new Vehicle(0);
        // create default vehicle; can be change with the selected options

        $form = $this->createForm(PrototypeType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $vehicle = new Vehicle($form->get('vehicle')->getData());

            $clone = clone $vehicle;

            $result = $clone->getResult();
            $result .= "<br>".  $vehicle->getResult();
        }


        return $this->render('prototype/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
