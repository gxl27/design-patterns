<?php

namespace App\Controller;

// use App\Entity\Iterator\WordsCollection;

use App\Entity\Memento\TextCareTaker;
use App\Entity\Memento\TextOriginator;

use App\Form\MementoType;
use App\Form\MementoHistoryType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MementoController extends AbstractController
{
    public $mementos = [];

    /**
     * @Route("/memento", name="memento", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
       
        $mementos = "";

        $originator = new TextOriginator();
        $careTaker = new TextCareTaker($originator);
       
        $form = $this->createForm(MementoType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $text = $form->get('text')->getData();
            $originator->doChanges($text);
            $careTaker->backup();
            $mementos = $careTaker->getMementos();
        }

        return $this->render('memento/index.html.twig', [
            'form' => $form->createView(),
            'mementos' => $mementos,

        ]);
    }
}
