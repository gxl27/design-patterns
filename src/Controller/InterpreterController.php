<?php

namespace App\Controller;

use App\Entity\Interpreter\GallonToLiter;
use App\Entity\Interpreter\MileToKm;
use App\Entity\Interpreter\GpmToLpk;
use App\Entity\Interpreter\LitreToGallon;
use App\Entity\Interpreter\KmToMile;
use App\Entity\Interpreter\LiterToGallon;
use App\Entity\Interpreter\LpkToGpm;

use App\Form\InterpreterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InterpreterController extends AbstractController
{
    /**
     * @Route("/interpreter", name="interpreter", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";

        $form = $this->createForm(InterpreterType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $amount = $form->get('amount')->getData();
            $type = $form->get('type')->getData();

            switch($type){
                case 0 :
                    $convertor = new LiterToGallon($amount);
                break;
                case 1 :
                    $convertor = new GallonToLiter($amount);
                break;
                case 2 :
                    $convertor = new KmToMile($amount);
                break;
                case 3 :
                    $convertor = new MileToKm($amount);
                break;
                case 4 :
                    $convertor = new LpkToGpm(new LiterToGallon($amount));
                break;
                case 5 :
                    $convertor = new GpmToLpk(new GallonToLiter($amount));
                break;

            }
            $result = $convertor->convert();
        }

        return $this->render('interpreter/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
