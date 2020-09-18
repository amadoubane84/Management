<?php

namespace App\Entity;

use App\Repository\RessourceRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass=RessourceRepository::class)
 * @Vich\Uploadable
 * @ORM\Table(name="Ressources")
 */
class Ressource
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    const CHOIX = [
        0=>'Stagiaire',
        1=>'Prestataire de services',
        2=>'CDD',
        3=>'CDI'
    ];
    const CHOIXUN = [
        0=>'Interne',
        1=>'Externe'
    ];
    const CHOIXDEUX = [
        0=>'Masculin',
        1=>'Féminin'
    ];
    const MATRIMONIALE = [
        0=>'Marié (e)',
        1=>'Célibataire',
        2=>'Divorcé (e)',
        3=>'Veuf (ve)'
    ];
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Diplomes;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_de_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lieu_de_naissance;

    /**
     * @ORM\Column(type="integer")
     */
    private $CNI;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Statut_dans_entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Situation_matrimoniale;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $IPRES;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $CSS;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Declaration_fiscale;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Impots;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type_de_contrat;
    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $filename;
    /**
     * @Vich\UploadableField(mapping="RH_image", fileNameProperty="filename")
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string|null
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTimeInterface|null
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type;

    /**
     * @ORM\Column(type="float")
     */
    private $Salaire_Brute;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Sexe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Penom): self
    {
        $this->Prenom = $Penom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getDiplomes(): ?string
    {
        return $this->Diplomes;
    }

    public function setDiplomes(?string $Diplomes): self
    {
        $this->Diplomes = $Diplomes;

        return $this;
    }

    public function getDateDeNaissance(): ?DateTimeInterface
    {
        return $this->Date_de_naissance;
    }

    public function setDateDeNaissance(DateTimeInterface $Date_de_naissance): self
    {
        $this->Date_de_naissance = $Date_de_naissance;

        return $this;
    }

    public function getLieuDeNaissance(): ?string
    {
        return $this->Lieu_de_naissance;
    }

    public function setLieuDeNaissance(string $Lieu_de_naissance): self
    {
        $this->Lieu_de_naissance = $Lieu_de_naissance;

        return $this;
    }

    public function getCNI(): ?int
    {
        return $this->CNI;
    }

    public function setCNI(int $CNI): self
    {
        $this->CNI = $CNI;

        return $this;
    }

    public function getStatutDansEntreprise(): ?string
    {
        return $this->Statut_dans_entreprise;
    }

    public function setStatutDansEntreprise(string $Statut_dans_entreprise): self
    {
        $this->Statut_dans_entreprise = $Statut_dans_entreprise;

        return $this;
    }

    public function getSituationMatrimoniale(): ?string
    {
        return $this->Situation_matrimoniale;
    }

    public function setSituationMatrimoniale(string $Situation_matrimoniale): self
    {
        $this->Situation_matrimoniale = $Situation_matrimoniale;

        return $this;
    }

    public function getIPRES(): ?float
    {
        return $this->IPRES;
    }

    public function setIPRES(?float $IPRES): self
    {
        $this->IPRES = $IPRES;

        return $this;
    }

    public function getCSS(): ?float
    {
        return $this->CSS;
    }

    public function setCSS(?float $CSS): self
    {
        $this->CSS = $CSS;

        return $this;
    }

    public function getDeclarationFiscale(): ?float
    {
        return $this->Declaration_fiscale;
    }

    public function setDeclarationFiscale(?float $Declaration_fiscale): self
    {
        $this->Declaration_fiscale = $Declaration_fiscale;

        return $this;
    }

    public function getImpots(): ?float
    {
        return $this->Impots;
    }

    public function setImpots(?float $Impots): self
    {
        $this->Impots = $Impots;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getTypeDeContrat(): ?string
    {
        return $this->Type_de_contrat;
    }

    public function setTypeDeContrat(string $Type_de_contrat): self
    {
        $this->Type_de_contrat = $Type_de_contrat;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param string|null $filename
     * @return Ressource
     */
    public function setFilename(?string $filename): Ressource
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|null $imageFile
     * @return Ressource
     * @throws Exception
     */
    public function setImageFile(?File $imageFile=null): Ressource
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new DateTime('now');
        }
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * @param string|null $imageName
     * @return Ressource
     */
    public function setImageName(?string $imageName): Ressource
    {
        $this->imageName = $imageName;
        return $this;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getSalaireBrute(): ?float
    {
        return $this->Salaire_Brute;
    }

    public function setSalaireBrute(float $Salaire_Brute): self
    {
        $this->Salaire_Brute = $Salaire_Brute;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->Telephone;
    }

    public function setTelephone(?int $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

}
