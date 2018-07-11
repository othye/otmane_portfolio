<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experiences
 *
 * @ORM\Table(name="experiences", indexes={@ORM\Index(name="experience", columns={"id_user"})})
 * @ORM\Entity
 */
class Experiences
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text", length=65535, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="text", length=65535, nullable=false)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="date_start", type="text", length=65535, nullable=false)
     */
    private $dateStart;

    /**
     * @var string
     *
     * @ORM\Column(name="date_finish", type="text", length=65535, nullable=false)
     */
    private $dateFinish;

    /**
     * @var string
     *
     * @ORM\Column(name="more_infos", type="text", length=65535, nullable=false)
     */
    private $moreInfos;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

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

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getDateStart(): ?string
    {
        return $this->dateStart;
    }

    public function setDateStart(string $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateFinish(): ?string
    {
        return $this->dateFinish;
    }

    public function setDateFinish(string $dateFinish): self
    {
        $this->dateFinish = $dateFinish;

        return $this;
    }

    public function getMoreInfos(): ?string
    {
        return $this->moreInfos;
    }

    public function setMoreInfos(string $moreInfos): self
    {
        $this->moreInfos = $moreInfos;

        return $this;
    }

    public function getIdUser(): ?Users
    {
        return $this->idUser;
    }

    public function setIdUser(?Users $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


}
