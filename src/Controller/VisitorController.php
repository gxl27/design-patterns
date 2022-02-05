<?php

namespace App\Controller;

use App\Entity\Visitor\TV;
use App\Entity\Visitor\Laptop;
use App\Entity\Visitor\Fridge;
use App\Entity\Visitor\AirConditioner;
use App\Entity\Visitor\ShopingCartVisitorImpl;
use App\Form\VisitorType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class VisitorController extends AbstractController
{

    //total cost of the shopping item cart
    public $totalCost;

    /**
     * @Route("/visitor", name="visitor", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
     
        $cart = NULL;
        $products = $this->createProducts();

        $form = $this->createForm(VisitorType::class);

        $form->get('tv')->setData($products['tv']);
        $form->get('laptop')->setData($products['laptop']);
        $form->get('fridge')->setData($products['fridge']);
        $form->get('air')->setData($products['air']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $cart = $this->productCartAttach($products);
            
        //     $messageForm = $form->get('message')->getData();
        //     $message->setMessage($messageForm);
        //     $message = $this->usersStatusAttach($users, $message);
    
        }
        // $message->notify();

        return $this->render('visitor/index.html.twig', [
            'form' => $form->createView(),
            'cart' => $cart,
            'total' => $this->totalCost
        
        ]);
    }

    private function createProducts(){
        // create users array from all subscribers
        $products = [];

        for($i=0; $i<sizeof(TV::PRODUCTS); $i++){
            $products['tv'][$i] = new TV($i);
        }
        for($i=0; $i<sizeof(Laptop::PRODUCTS); $i++){
            $products['laptop'][$i] = new Laptop($i);
        }
        for($i=0; $i<sizeof(Fridge::PRODUCTS); $i++){
            $products['fridge'][$i] = new Fridge($i);
        }
        for($i=0; $i<sizeof(AirConditioner::PRODUCTS); $i++){
            $products['air'][$i] = new AirConditioner($i);
        }

        return $products;
    }

    private function productCartAttach($products){
        // attach or detach products after submited data
        $cart = [];

        $cart['tv'] = $this->generateCart($products['tv']);
        $cart['laptop'] = $this->generateCart($products['laptop']);
        $cart['fridge'] = $this->generateCart($products['fridge']);
        $cart['air'] = $this->generateCart($products['air']);

     
        return $cart;
    }

    private function generateCart($products){
        $shopV = new ShopingCartVisitorImpl(); 
        $cart = [];

        for($i=0; $i<sizeof($products); $i++){
            if(!$products[$i]->accept($shopV)){
                unset($cart[$i]);
            }else{

                $cart[$i] = $products[$i]->accept($shopV);
                $this->totalCost +=  $cart[$i]['total'];
            }
        }

        return $cart;
    }
}
