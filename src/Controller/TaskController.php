<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use App\Form\TaskType;
use App\Entity\Task;

class TaskController extends AbstractController
{
     /**
     * @Route("/tasks", name="tasks")
     */
    public function index()
    {
        $tasks = $this->getDoctrine()
            ->getRepository(Task::class)
            ->findAll();

        //return new Response('Saved new product with id '.$product->getId());
        return $this->render('task/index.html.twig', [
            'tasks' => $tasks,
        ]);
    }

     /**
     * @Route("/tasks/new", name="task_form")
     */
    public function new(Request $request)
    {
        // creates a task and gives it some dummy data for this example
        $task = new Task();

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('tasks');
        }

        return $this->render('task/new.html.twig', [
            'form' => $form->createView(),
            'task' => $task,
        ]);
    }
}
?>