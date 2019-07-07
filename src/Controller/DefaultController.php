<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request) {

        $defaults = [
            'dueDate' => new \DateTime('tomorrow'),
        ];

        $form = $this->createFormBuilder($defaults)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->getForm();

        return $this->render('default/new.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'DefaultController',
        ]);
    }
}