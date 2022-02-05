<?php

namespace App\Controller;

use App\Entity\Bridge\AbstractCar;

use App\Form\BridgeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BridgeController extends AbstractController
{
    /**
     * @Route("/bridge", name="bridge", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";
        

        $form = $this->createForm(BridgeType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // get selected data and create the engine and the car objects
            $carName = $form->get('car')->getData();
            $engineName = $form->get('engine')->getData();
            $carName = "App\Entity\Bridge\\"  .$carName;
            $engineName = "App\Entity\Bridge\\"  .$engineName;

            $engine =  new $engineName();
            $car =  new $carName($engine);

            // run the car method (it calls also the engine methods)
            $result = $car->description();
            
        }


        return $this->render('bridge/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
