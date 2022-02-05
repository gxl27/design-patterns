<?php

namespace App\Controller;

// pattern description (constants) 

use App\Entity\Command\Account;
use App\Entity\Command\Bet;
use App\Entity\Command\Game;
use App\Entity\Command\GameList;
use App\Form\CommandType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommandController extends AbstractController
{
    /**
     * @Route("/command", name="command", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";
        $games = [];
        $tickets = [];
        $account = new Account(100000);
        $this->ballance = $account->getBallance();
        // create the games using the GameList class;
        for($i=0; $i < sizeof(GameList::GAMES); $i++){
            $games[$i] = new Game(GameList::GAMES[$i]);
   
        }
        
        $form = $this->createForm(CommandType::class);
        $form->get('games')->setData($games);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $this->check($form)) {

            $sum =  $form->get('ballance')->getData() * 100;
            $account->addCommand(new Bet($sum, $games));
            $tickets = $account->placeBets();

            $this->ballance = $this->ballance - $sum;
          
            // $creator->create($form->get('vehicle')->getData());
        }


        return $this->render('command/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result,
            'ballance' => $this->ballance,
            'tickets' => $tickets
        ]);
    }

    private function check($form){
        $checkBallance = $this->checkBallance($form->get('ballance')->getData());
        $checkGames = $this->checkGames($form->get('games')->getData());

        if($checkBallance && $checkGames){
            return true;
        }

        return false;
       
    }

    private function checkBallance($sum){
        if($sum * 100 > $this->ballance){
            return 0;
        }else{
            return 1;
        }
    }

    private function checkGames($games){
     
       
        foreach($games as $key => $game){
            if(!$game->getMarked1() && !$game->getMarked2()){
 
                unset($games[$key]);
            }
        }
        $games = array_values($games);
        
        if(sizeof($games) > 0){
            return 1;
        }else{
            return 0;
        }

    }
}
