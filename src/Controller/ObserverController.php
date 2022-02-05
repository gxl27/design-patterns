<?php

namespace App\Controller;

use App\Entity\Observer\CustomAppUserObserver;
use App\Entity\Observer\PcUserObserver;
use App\Entity\Observer\MobileUserObserver;
use App\Entity\Observer\Message;

use App\Form\ObserverType;
use App\Form\ObserverUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ObserverController extends AbstractController
{
    /**
     * @Route("/observer", name="observer", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
     
        $message = new Message('');
        $users = $this->createUsers();
       
        
        // set subscriber to subject

        $form = $this->createForm(ObserverType::class);
        $form->get('pc')->setData($users['pc']);
        $form->get('mobile')->setData($users['mobile']);
        $form->get('customapp')->setData($users['customapp']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $messageForm = $form->get('message')->getData();
            $message->setMessage($messageForm);
            $message = $this->usersStatusAttach($users, $message);
    
        }
        $message->notify();

        return $this->render('observer/index.html.twig', [
            'form' => $form->createView(),
            'users' => $users,
        ]);
    }

    private function createUsers(){
        // create users array from all subscribers
        $users = [];

        for($i=0; $i< sizeof(Message::PCUSERS); $i++){
            $users['pc'][$i] = new PcUserObserver(Message::PCUSERS[$i]);
        }
        for($i=0; $i< sizeof(Message::MOBILEUSERS); $i++){
            $users['mobile'][$i] = new MobileUserObserver(Message::MOBILEUSERS[$i]);
        }
        for($i=0; $i< sizeof(Message::CUSTOMAPPUSERS); $i++){
            $users['customapp'][$i] = new CustomAppUserObserver(Message::CUSTOMAPPUSERS[$i]);
        }

        return $users;
    }

    private function usersStatusAttach($users, $message){
        // attach or detach users after submited data

        for($i=0; $i< sizeof($users['pc']); $i++){
            if($users['pc'][$i]->getStatus()){
                $message->attach($users['pc'][$i]);
            }else{
                $message->detach($users['pc'][$i]);
            }
        }

        for($i=0; $i< sizeof($users['mobile']); $i++){
            if($users['mobile'][$i]->getStatus()){
                $message->attach($users['mobile'][$i]);
            }else{
                $message->detach($users['mobile'][$i]);
            }
        }

        for($i=0; $i< sizeof($users['customapp']); $i++){
            if($users['customapp'][$i]->getStatus()){
                $message->attach($users['customapp'][$i]);
            }else{
                $message->detach($users['customapp'][$i]);
            }
        }

        return $message;
    }
}
