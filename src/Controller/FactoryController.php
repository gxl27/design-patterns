<?php

namespace App\Controller;

use App\Entity\Factory\Creator;

use App\Form\FactoryVehicleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FactoryController extends AbstractController
{
    /**
     * @Route("/factory", name="factory", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";
        $creator = new Creator;
        // create default vehicle; can be change with the selected options
        $creator->create('Car');

        $form = $this->createForm(FactoryVehicleType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $creator->create($form->get('vehicle')->getData());

            $vehicle = $creator->getVehicle();
            $result = $vehicle->calculate();
        }

        return $this->render('factory/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
