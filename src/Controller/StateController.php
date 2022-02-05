<?php

namespace App\Controller;

use App\Entity\State\Mobile;
use App\Entity\State\Vibration;
use App\Entity\State\Loud;
use App\Entity\State\Silent;

use App\Form\StateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class StateController extends AbstractController
{
    /**
     * @Route("/state", name="state", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        // use cookie to track the state (every submit will increment the state by 1)
        setcookie('state', "0");

        $result = "";
        $mobile = new Mobile(new Loud());
        $form = $this->createForm(StateType::class);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cookie = (int)$request->cookies->get('state');
            $cookie = $cookie + 1;
            setcookie('state', $cookie);
            $mobile->transitionState($cookie);
            
        }

        $result = $mobile->alert();

        return $this->render('state/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
