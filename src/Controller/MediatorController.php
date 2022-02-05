<?php

namespace App\Controller;

// use App\Entity\Observer\CustomAppUserObserver;

use App\Form\MediatorType;
use App\Form\MediatorUserType;

use App\Entity\Mediator\ChatMediatorImpl;
use App\Entity\Mediator\UserImpl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MediatorController extends AbstractController
{
    /**
     * @Route("/mediator", name="mediator", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $users = [];
        $mediator = new ChatMediatorImpl();
        $form = $this->createForm(MediatorType::class);

        for($i=0; $i<sizeof(UserImpl::USERS); $i++){
            // create each user and add it to the mediator
            $users[$i] = new UserImpl($mediator, UserImpl::USERS[$i]);
            $mediator->addUser($users[$i]);
        }
        // set the collection form with users and a unmapped textarea for each one
        $form->get('users')->setData($users);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // get the collection form
            $rawUsers = $form->get('users');
            for($i=0; $i<sizeof($rawUsers); $i++){
                // iterate the collection form and get the sent message from the each user
                $rawMessage = $rawUsers[$i]->get('message')->getData();
                if($rawMessage){
                    // if an user sent a message, user entity will use the mediator to add the message to each user
                    $rawUser = $rawUsers[$i]->getData();
                    $rawUser->send($rawMessage);
                }
            }

    
        }

        return $this->render('mediator/index.html.twig', [
            'form' => $form->createView(),
            'users' => $users,
        ]);
    }

    
}
