<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 */
class Task
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $task;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dueDate;

    public function getId()
    {
        return $this->id;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function setTask(string $task)
    {
        $this->task = $task;

        return $this;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTimeInterface $dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }
}
