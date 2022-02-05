<?php

namespace App\Controller;

use App\Entity\Composite\Catalogue;
use App\Entity\Composite\Component;
use App\Entity\Composite\Group;
use App\Entity\Composite\Student;
use App\Entity\Composite\Grades;

use App\Form\CompositeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class CompositeController extends AbstractController
{
    /**
     * @Route("/composite", name="composite", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $result = "";
        // $creator = new Creator;

        // $creator->create('Car');

        $form = $this->createForm(CompositeType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $result = $this->createGroups($form);
            

        }


        return $this->render('composite/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }

    private function createGroups($form){
        $groupNumber = $form->get('group')->getData();
        $min = $form->get('min')->getData();
        $max = $form->get('max')->getData();
        
        $exams = $form->get('exams')->getData();

        // $groups = $this->createStudents($min, $max, $exams);

        $groupList = Component::CLASSES;
        shuffle($groupList);

        $catalogue = new Catalogue();
        for($i=0; $i<$groupNumber; $i++){
            $group = new Group($groupList[$i]);
            $randStundentNumber = $this->randomStundentNumber($min, $max);

            for($j=0; $j<$randStundentNumber; $j++){
                $student = new Student(Component::NAMES[array_rand(Component::NAMES)]);

                for($k=0; $k<$exams; $k++){
                    $student->addChildren(new Grades());
                }

                $group->addChildren($student);
            }

            $catalogue->addChildren($group);
            
        }


        return $catalogue->operation();
    }

    private function randomStundentNumber($min, $max){
        $result = rand($min, $max);
        return $result;
    }
}
