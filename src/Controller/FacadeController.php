<?php

namespace App\Controller;

use App\Entity\Facade\Plane;
use App\Entity\Facade\Engine;
use App\Form\FacadeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FacadeController extends AbstractController
{
    /**
     * @Route("/facade", name="facade", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";

        $plane = new Plane(new Engine());
        $engine = $plane->getEngine();

        $form = $this->createForm(FacadeType::class);
        // set default values
        $form->get('oil')->setData($engine->getOil()->getOilValue());
        $form->get('fuel')->setData($engine->getFuel()->getFuelValue());
        $form->get('temperature')->setData($engine->getTemperature()->getTemperatureValue());
        $form->get('flaps')->setData($engine->getFlaps()->getFlapsValue());
        $form->get('landingGear')->setData($engine->getLandingGear()->getLandingGear());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // modify parameters with the submited ones;
            $oil = $form->get('oil')->getData();
            $fuel = $form->get('fuel')->getData();
            $temperature = $form->get('temperature')->getData();
            $flaps = $form->get('flaps')->getData();
            $landingGear = $form->get('landingGear')->getData();

            $engine->getOil()->setOilValue($oil);
            $engine->getFuel()->setFuelValue($fuel);
            $engine->getTemperature()->setTemperatureValue($temperature);
            $engine->getFlaps()->setFlapsValue($flaps);
            $engine->getLandingGear()->setLandingGear($landingGear);
  
            // switch case for the submited action
            $type = $form->get('type')->getData();
            switch($type){
                case 1: 
                    $result = $engine->start();
                    break;
                case 2:
                    $result = $engine->status();
                    break;
                case 3:
                    $result = $engine->land();
                    break;
                default: throw new \Exception("unknown operation", 404);
            }   

        }

        return $this->render('facade/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
