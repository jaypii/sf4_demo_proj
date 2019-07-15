<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgURL;

    /**
     * @ORM\Column(type="text")
     */
    private $atext;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $tags = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImgURL(): ?string
    {
        return $this->imgURL;
    }

    public function setImgURL(?string $imgURL): self
    {
        $this->imgURL = $imgURL;

        return $this;
    }

    public function getAtext(): ?string
    {
        return $this->atext;
    }

    public function setAtext(string $atext): self
    {
        $this->atext = $atext;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }
}
