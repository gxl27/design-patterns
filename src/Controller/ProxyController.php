<?php

namespace App\Controller;

use App\Entity\Proxy\ProxyWebsite;
use App\Entity\Proxy\Website;

use App\Form\ProxyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProxyController extends AbstractController
{
    /**
     * @Route("/proxy", name="proxy", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";
        // $vehicle = new Car();

        // $bridge = new VehicleBridge($vehicle);
        // $result = $bridge->run();

        $form = $this->createForm(ProxyType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
      
            $websiteId = $form->get('website')->getData();

            $proxy = new ProxyWebsite();
            $result = $proxy->request($websiteId);
             // if(!$form->get('vehicle')->getData()){
            //     $vehicle = new Car();
                
            // }else {
            //     $vehicle = new Plane();

            // }

            // $bridge->setVehicle($vehicle);
            // $result = $bridge->run();
            
        }


        return $this->render('proxy/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
