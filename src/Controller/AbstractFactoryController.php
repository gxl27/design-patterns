<?php

namespace App\Controller;

use App\Entity\AbstractFactory\ToyFactory;
use App\Entity\AbstractFactory\VehicleFactory;
use App\Form\AbstractFactoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AbstractFactoryController extends AbstractController
{
    /**
     * @Route("/abstract", name="abstract", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";
        // create default factory with default vehicle; can be change with the selected options
        $factory = new VehicleFactory();
        $factory->createProduct('Car');


        $form = $this->createForm(AbstractFactoryType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $factoryName = $form->get('factory')->getData();
            $productName = $form->get('product')->getData();
            switch ($factoryName) {
                case 'Vehicle':
                    $factory = new VehicleFactory();
                    break;
                case 'Toy':
                    $factory = new ToyFactory();
                    break;
                default:
                    throw new \Exception("$factoryName factory not found");
                    break;
            }
            $factory->createProduct($productName);
            
        }
        // display the message from the product ()
        $result = $factory->display();

        return $this->render('abstract/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
