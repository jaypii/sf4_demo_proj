<?php

namespace App\Controller;

use App\Entity\TestEnt;
use App\Form\TestEntType;
use App\Repository\TestEntRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/test/ent")
 */
class TestEntController extends AbstractController
{
    /**
     * @Route("/crud", name="test_ent_index", methods={"GET"})
     */
    public function index(TestEntRepository $testEntRepository)
    {
        return $this->render('test_ent/index.html.twig', [
            'test_ents' => $testEntRepository->findAll(),
        ]);
    }

    /**
     * @Route("/crud/new", name="test_ent_new", methods={"GET","POST"})
     */
    public function new(Request $request)
    {
        $testEnt = new TestEnt();
        $form = $this->createForm(TestEntType::class, $testEnt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($testEnt);
            $entityManager->flush();

            return $this->redirectToRoute('test_ent_index');
        }

        return $this->render('test_ent/new.html.twig', [
            'test_ent' => $testEnt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/crud/{id}", name="test_ent_show", methods={"GET"})
     */
    public function show(TestEnt $testEnt)
    {
        return $this->render('test_ent/show.html.twig', [
            'test_ent' => $testEnt,
        ]);
    }

    /**
     * @Route("/crud/{id}/edit", name="test_ent_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TestEnt $testEnt)
    {
        $form = $this->createForm(TestEntType::class, $testEnt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('test_ent_index', [
                'id' => $testEnt->getId(),
            ]);
        }

        return $this->render('test_ent/edit.html.twig', [
            'test_ent' => $testEnt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/crud/{id}", name="test_ent_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TestEnt $testEnt)
    {
        if ($this->isCsrfTokenValid('delete'.$testEnt->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($testEnt);
            $entityManager->flush();
        }

        return $this->redirectToRoute('test_ent_index');
    }
}
