<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(formats={"json"})
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_commande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mode_paiment;

    /**
     * @ORM\Column(type="boolean")
     */
    private $paiment_valide;

    /**
     * @ORM\Column(type="date")
     */
    private $date_paiment;

    /**
     * @ORM\OneToMany(targetEntity=LigneCommande::class, mappedBy="idCommande")
     */
    private $ligneCommandes;

    /**
     * @ORM\ManyToOne(targetEntity=Livraison::class, inversedBy="commandes")
     */
    private $idLivrivation;

    /**
     * @ORM\ManyToOne(targetEntity=Facture::class, inversedBy="commandes")
     */
    private $Facture;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Commande")
     */
    private $user_id;

    public function __construct()
    {
        $this->ligneCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->date_commande;
    }

    public function setDateCommande(\DateTimeInterface $date_commande): self
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    public function getModePaiment(): ?string
    {
        return $this->mode_paiment;
    }

    public function setModePaiment(string $mode_paiment): self
    {
        $this->mode_paiment = $mode_paiment;

        return $this;
    }

    public function getPaimentValide(): ?bool
    {
        return $this->paiment_valide;
    }

    public function setPaimentValide(bool $paiment_valide): self
    {
        $this->paiment_valide = $paiment_valide;

        return $this;
    }

    public function getDatePaiment(): ?\DateTimeInterface
    {
        return $this->date_paiment;
    }

    public function setDatePaiment(\DateTimeInterface $date_paiment): self
    {
        $this->date_paiment = $date_paiment;

        return $this;
    }

    /**
     * @return Collection<int, LigneCommande>
     */
    public function getLigneCommandes(): Collection
    {
        return $this->ligneCommandes;
    }

    public function addLigneCommande(LigneCommande $ligneCommande): self
    {
        if (!$this->ligneCommandes->contains($ligneCommande)) {
            $this->ligneCommandes[] = $ligneCommande;
            $ligneCommande->setIdCommande($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): self
    {
        if ($this->ligneCommandes->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getIdCommande() === $this) {
                $ligneCommande->setIdCommande(null);
            }
        }

        return $this;
    }

    public function getIdLivrivation(): ?Livraison
    {
        return $this->idLivrivation;
    }

    public function setIdLivrivation(?Livraison $idLivrivation): self
    {
        $this->idLivrivation = $idLivrivation;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->Facture;
    }

    public function setFacture(?Facture $Facture): self
    {
        $this->Facture = $Facture;

        return $this;
    }

    public function __toString(){
        
        return $this->mode_paiment;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}
