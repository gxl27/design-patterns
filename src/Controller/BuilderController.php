<?php

namespace App\Controller;

use App\Entity\Factory\Creator;
use App\Entity\Builder\Director;
use App\Form\BuilderFrameworkType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BuilderController extends AbstractController
{
    /**
     * @Route("/builder", name="builder", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";
        // $creator = new Creator;
        // // create default vehicle; can be change with the selected options
        // $creator->create('Car');

        $form = $this->createForm(BuilderFrameworkType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $frameworkId = $form->get('framework')->getData();
            $details = $form->get('details')->getData();
            $director = new Director($frameworkId, $details);;
            $result = $director->build($details);
  
            // can also be reseted
            // $builder->reset();
       
        }

        return $this->render('builder/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
