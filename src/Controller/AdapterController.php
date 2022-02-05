<?php

namespace App\Controller;

use App\Entity\Adapter\Car;
use App\Entity\Adapter\Plane;
use App\Entity\Adapter\PlaneAdapter;
use App\Form\AdapterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdapterController extends AbstractController
{
    /**
     * @Route("/adapter", name="adapter", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";


        $form = $this->createForm(AdapterType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if(!$form->get('vehicle')->getData()){
                $car = new Car();
                $result = $car->drive();
            }else {
                $plane = new Plane();
                $result = "Cannot drive a plane, so need to use an adapter;";
                $adapter = new PlaneAdapter($plane);
                $result .= "<br>". $adapter->drive();
            }
            
        }


        return $this->render('adapter/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
