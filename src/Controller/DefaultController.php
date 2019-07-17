<?php

namespace App\Controller;

use App\Service\MessageGenerator;
use App\Service\DataService;
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
    public function index(
        MessageGenerator $messageGenerator,
        DataService $dataService)
    {
        $countries = $dataService->findAll();
        $message = $messageGenerator->getHappyMessage();
        $this->addFlash('success', $message);

        return $this->render('default/index.html.twig', [
            'message' => $message,
            'data' => $countries,
        ]);
    }
}