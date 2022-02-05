<?php

namespace App\Controller;

use App\Entity\Template\AbstractMenu;
use App\Entity\Template\SmartMenu;

use App\Form\TemplateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TemplateController extends AbstractController
{
    /**
     * @Route("/template", name="template", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";
        

        $form = $this->createForm(TemplateType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // factory the chose option
            $menuName = AbstractMenu::MENU[$form->get('menu')->getData()];
            $menuName = str_replace(' ', '', $menuName);
            $menuName = "App\Entity\Template\\"  .ucfirst($menuName);
            $menu =  new $menuName();

            $delivery = $form->get('delivery')->getData();
            $drink = $form->get('drink')->getData();
            
            $result = $menu->processOrder($drink, $delivery);
        }

     

        return $this->render('template/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
