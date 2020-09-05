<?php

namespace App\Entity;

use App\Repository\GestionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GestionRepository::class)
 * @ORM\Table(name="gestions")
 */
class Gestion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $Marches;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Maitre_ouvrage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Projets;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Montant_FCFA_TTC;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_debut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Contrat;

    /**
     * @ORM\Column(type="date")
     */
    private $Duree;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_fin;
    private Const CHOIX =[
        0=> 'Pas disponible',
        1=> 'En cours',
        1=> 'Disponible'
    ];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarches(): ?string
    {
        return $this->Marches;
    }

    public function setMarches(string $Marches): self
    {
        $this->Marches = $Marches;

        return $this;
    }

    public function getMaitreOuvrage(): ?string
    {
        return $this->Maitre_ouvrage;
    }

    public function setMaitreOuvrage(string $Maitre_ouvrage): self
    {
        $this->Maitre_ouvrage = $Maitre_ouvrage;

        return $this;
    }

    public function getProjets(): ?string
    {
        return $this->Projets;
    }

    public function setProjets(string $Projets): self
    {
        $this->Projets = $Projets;

        return $this;
    }

    public function getMontantFCFATTC(): ?string
    {
        return $this->Montant_FCFA_TTC;
    }

    public function setMontantFCFATTC(string $Montant_FCFA_TTC): self
    {
        $this->Montant_FCFA_TTC = $Montant_FCFA_TTC;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->Date_debut;
    }

    public function setDateDebut(\DateTimeInterface $Date_debut): self
    {
        $this->Date_debut = $Date_debut;

        return $this;
    }

    public function getContrat(): ?string
    {
        return $this->Contrat;
    }

    public function setContrat(string $Contrat): self
    {
        $this->Contrat = $Contrat;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->Duree;
    }

    public function setDuree(\DateTimeInterface $Duree): self
    {
        $this->Duree = $Duree;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->Date_fin;
    }

    public function setDateFin(\DateTimeInterface $Date_fin): self
    {
        $this->Date_fin = $Date_fin;

        return $this;
    }
}
