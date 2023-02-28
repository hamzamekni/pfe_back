<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(formats={"json"})
 * @ORM\Entity(repositoryClass=LivraisonRepository::class)
 */
class Livraison
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
    private $etat_livraison;

    /**
     * @ORM\Column(type="date")
     */
    private $date_livraison;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $prix_livraison;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="idLivrivation")
     */
    private $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtatLivraison(): ?string
    {
        return $this->etat_livraison;
    }

    public function setEtatLivraison(string $etat_livraison): self
    {
        $this->etat_livraison = $etat_livraison;

        return $this;
    }

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->date_livraison;
    }

    public function setDateLivraison(\DateTimeInterface $date_livraison): self
    {
        $this->date_livraison = $date_livraison;

        return $this;
    }

    public function getPrixLivraison(): ?string
    {
        return $this->prix_livraison;
    }

    public function setPrixLivraison(string $prix_livraison): self
    {
        $this->prix_livraison = $prix_livraison;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setIdLivrivation($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getIdLivrivation() === $this) {
                $commande->setIdLivrivation(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->etat_livraison;
    }
}
