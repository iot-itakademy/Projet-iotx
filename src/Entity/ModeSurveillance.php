<?php

namespace App\Entity;

use App\Repository\ModeSurveillanceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModeSurveillanceRepository::class)]
class ModeSurveillance implements ModeSurveillanceInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle;

    #[ORM\Column(type: 'string', length: 255)]
    private $parameters;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getParameters(): ?string
    {
        return $this->parameters;
    }

    public function setParameters(string $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }
}
