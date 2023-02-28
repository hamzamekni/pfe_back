<?php

namespace App\Entity;

use App\Repository\LigneCommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(formats={"json"})
 * @ORM\Entity(repositoryClass=LigneCommandeRepository::class)
 */
class LigneCommande
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
    private $quantite_commande;
    
    

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="idLigne")
     */
    private $products;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="ligneCommandes")
     */
    private $idCommande;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantiteCommande(): ?string
    {
        return $this->quantite_commande;
    }

    public function setQuantiteCommande(string $quantite_commande): self
    {
        $this->quantite_commande = $quantite_commande;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setIdLigne($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getIdLigne() === $this) {
                $product->setIdLigne(null);
            }
        }

        return $this;
    }

    public function getIdCommande(): ?Commande
    {
        return $this->idCommande;
    }

    public function setIdCommande(?Commande $idCommande): self
    {
        $this->idCommande = $idCommande;

        return $this;
    }

    public function __toString(){
        return $this->quantite_commande;
    }
}
