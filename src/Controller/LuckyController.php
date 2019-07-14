<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number/{max}", name="lucky")
     */
    public function number($max=100,LoggerInterface $logger)
    {
        $logger->info('We are logging!');

        $number = random_int(0, $max);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }
}
