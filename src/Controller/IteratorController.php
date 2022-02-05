<?php

namespace App\Controller;

use App\Entity\Iterator\WordsCollection;

use App\Form\IteratorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IteratorController extends AbstractController
{
    /**
     * @Route("/iterator", name="iterator", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $words = [];
   

        $form = $this->createForm(IteratorType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $order = $form->get('order')->getData();
            $text = $form->get('words')->getData();
            $filter = $form->get('filter')->getData();

            // old implementation
            // replace all special chars from the text
            $text = preg_replace("/[^A-Za-z0-9]/ ", ' ', $text);
            // create an array, remove empty elements from the array and reset the array keys
            $rawWords = array_values(array_filter( explode(" ", $text), 'strlen' )); 
            $wordsCollection = new WordsCollection($rawWords);

            $wordsCollection->setMinLenght($filter);
            
            if(!$order){
                foreach ($wordsCollection->getIterator() as $item) {
                    array_push($words, $item);
                 
                }

            }else {
                foreach ($wordsCollection->getReverseIterator() as $item) {
                    array_push($words, $item);
                 
                }


            }
      
        }

     

        return $this->render('iterator/index.html.twig', [
            'form' => $form->createView(),
            'words' => $words,

        ]);
    }
}
