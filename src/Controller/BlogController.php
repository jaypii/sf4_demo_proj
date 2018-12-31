<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * Matches /blog exactly
     *
     * @Route("/blog", name="blog_list")
     */
    public function index()
    {
        {
            return $this->render('blog/list.html.twig', [
                'controller_name' => 'BlogController',
            ]);
        }
    }

    /**
     * Matches /blog/*
     *
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function show($slug)
    {
        {
            $slug = 'test';
            return $this->render('blog/show.html.twig', [
                'controller_name' => 'BlogController',
            ]);
        }
    }
}