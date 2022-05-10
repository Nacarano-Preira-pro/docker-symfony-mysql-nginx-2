<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\ManyToMany(targetEntity: Article::class, mappedBy: 'Category')]
    private $articleByCategory;

    public function __construct()
    {
        $this->articleByCategory = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticleByCategory(): Collection
    {
        return $this->articleByCategory;
    }

    public function addArticleByCategory(Article $articleByCategory): self
    {
        if (!$this->articleByCategory->contains($articleByCategory)) {
            $this->articleByCategory[] = $articleByCategory;
            $articleByCategory->addCategory($this);
        }

        return $this;
    }

    public function removeArticleByCategory(Article $articleByCategory): self
    {
        if ($this->articleByCategory->removeElement($articleByCategory)) {
            $articleByCategory->removeCategory($this);
        }

        return $this;
    }
}
