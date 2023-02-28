<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints\File;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\FileFilter;

/**
 * @ApiResource(formats={"json"})
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @Vich\Uploadable
 * @ApiFilter(SearchFilter::class, properties={"label": "ipartial","id":"exact","imageFile":"exact","image":"ipartial"})
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_product;

    /**
     * @ORM\Column(type="integer")
     */
    private $tva;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $prix_progduit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     */
    private $idCategory;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;
    
    /**
     * @ORM\OneToOne(targetEntity=Stock::class, cascade={"persist", "remove"})
     */
    private $idStock;

    /**
     * @ORM\ManyToOne(targetEntity=LigneCommande::class, inversedBy="products")
     */
    private $idLigne;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="products")
     */
    private $publisher;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameProduct(): ?string
    {
        return $this->name_product;
    }

    public function setNameProduct(string $name_product): self
    {
        $this->name_product = $name_product;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getPrixProgduit(): ?string
    {
        return $this->prix_progduit;
    }

    public function setPrixProgduit(string $prix_progduit): self
    {
        $this->prix_progduit = $prix_progduit;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getIdCategory(): ?Category
    {
        return $this->idCategory;
    }

    public function setIdCategory(?Category $idCategory): self
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    public function getIdStock(): ?Stock
    {
        return $this->idStock;
    }

    public function setIdStock(?Stock $idStock): self
    {
        $this->idStock = $idStock;

        return $this;
    }

    public function getIdLigne(): ?LigneCommande
    {
        return $this->idLigne;
    }

    public function setIdLigne(?LigneCommande $idLigne): self
    {
        $this->idLigne = $idLigne;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setImageFile($image = null)
    {
        //dd($image);
        $this->imageFile = $image;


        if ($image) {
            $this->updateAt = new \DateTime('now');
        }
    }

    public function __toString(){
        return $this->name_product;
    }

    public function getPublisher(): ?User
    {
        return $this->publisher;
    }

    public function setPublisher(?User $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }
   
}
