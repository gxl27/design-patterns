<?php

namespace App\Controller;

use App\Entity\Singleton\Singleton;
use App\Entity\Singleton\SingletonGlobalConfig;

use App\Form\SingletonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\Twig\GlobalConfig;

class SingletonController extends AbstractController
{
    /**
     * @Route("/singleton", name="singleton", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";
        $globalConfig = SingletonGlobalConfig::getInstance();
        $globalConfig->setColor('green');
        $globalConfig->setNumber(10);

        $form = $this->createForm(SingletonType::class);
        $form->get('number')->setData('10');
        $form->get('color')->setData('green');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $type = $form->get('type')->getData();
            if($type){
                // if it's selected "new config"

                $globalConfig2 = SingletonGlobalConfig::getInstance();
                // check if the config objects are the same
                if($globalConfig === $globalConfig2){
                    $result .= "it's the the same configuration (cannot create a new one)
                    <br> To change the configuration select the option!<br>";
                }else{
                    // this statement never execute
                    $result .= "Fatal error";
                    $globalConfig = $globalConfig2;
                }

            }else{
                $globalConfig->setNumber($form->get('number')->getData());
                $globalConfig->setColor($form->get('color')->getData());
            }
            
        }
        
        $result .= "Current configuration settings: <br> Number: ". $globalConfig->getNumber() . "<br> Color: " . $globalConfig->getColor(). "<br>";

        return $this->render('singleton/index.html.twig', [
            'result' => $result,
            'form' => $form->createView(),
        ]);
    }
}
