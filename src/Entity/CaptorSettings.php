<?php

namespace App\Entity;

use App\Repository\CaptorSettingsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaptorSettingsRepository::class)]
class CaptorSettings implements CaptorSettingsInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'json')]
    private $parameters = [];

    #[ORM\Column(type: 'integer')]
    private $port;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle;

    #[ORM\Column(type: 'string', length: 255)]
    private $last_edit_by;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParameters(): ?array
    {
        return $this->parameters;
    }

    public function setParameters(array $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function setPort(int $port): self
    {
        $this->port = $port;

        return $this;
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

    public function getLastEditBy(): ?string
    {
        return $this->last_edit_by;
    }

    public function setLastEditBy(string $last_edit_by): self
    {
        $this->last_edit_by = $last_edit_by;

        return $this;
    }
}
