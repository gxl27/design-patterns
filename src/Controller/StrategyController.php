<?php

namespace App\Controller;

use App\Entity\Strategy\City;
use App\Entity\Strategy\Context;
use App\Form\StrategyCityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class StrategyController extends AbstractController
{
    /**
     * @Route("/strategy", name="strategy", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";
        $city = new City();
        $form = $this->createForm(StrategyCityType::class, $city);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $context = new Context($city);
            $result = $context->execute();
        }

        return $this->render('strategy/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
