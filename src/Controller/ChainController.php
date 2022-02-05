<?php

namespace App\Controller;

use App\Entity\Chain\Currency;
use App\Entity\Chain\HundredNote;
use App\Entity\Chain\FiftyNote;
use App\Entity\Chain\TwentyNote;
use App\Entity\Chain\TenNote;

use App\Form\ChainType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChainController extends AbstractController
{
    /**
     * @Route("/chain", name="chain", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";

        // create the chains
        $ten = new TenNote();
        $twenty = new TwentyNote();
        $fifty = new FiftyNote();
        $hundred = new HundredNote();

        // set responsabilities
        $twenty->setNextChain($ten);
        $fifty->setNextChain($twenty);
        $hundred->setNextChain($fifty);

        $form = $this->createForm(ChainType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $currencyValue = $form->get('currency')->getData();
            $type = $form->get('type')->getData();
            $currency = new Currency($currencyValue, $type);
            $result = $hundred->dispense($currency);
            
        }


        return $this->render('chain/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
