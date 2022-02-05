<?php

namespace App\Controller;

use App\Entity\Decorator\AbstractDecorator;
use App\Entity\Decorator\ConsoleDecorator;
use App\Entity\Decorator\Solitaire;
use App\Entity\Decorator\Counterstrike;
use App\Entity\Decorator\Needforspeed;

use App\Entity\Patterns\Patterns;
use App\Form\DecoratorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DecoratorController extends AbstractController
{
    /**
     * @Route("/decorator", name="decorator", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";
        // create default factory with default vehicle; can be change with the selected options

        $form = $this->createForm(DecoratorType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $gameId = $form->get('game')->getData();
            $gameType = $form->get('type')->getData();

            $gameName = AbstractDecorator::GAMES[$gameId];
            // remove the whitespace from the name (for the class loader)
            $gameName = str_replace(' ', '', $gameName);

            $gameName = "App\Entity\Decorator\\"  .ucfirst($gameName);
            $game =  new $gameName();

            $console = new ConsoleDecorator($game);
            $console->setType(AbstractDecorator::TYPE[$gameType]);
            
            // display the message
            $result = $console->start();
            
        }

        return $this->render('decorator/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
