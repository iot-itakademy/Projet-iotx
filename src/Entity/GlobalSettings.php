<?php

namespace App\Entity;

use App\Repository\GlobalSettingsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GlobalSettingsRepository::class)]
class GlobalSettings implements GlobalSettingsInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $mode_de_surveillance;

    #[ORM\Column(type: 'string', length: 255)]
    private $fuseau_horaire;

    #[ORM\Column(type: 'boolean')]
    private $service_mail;

    #[ORM\Column(type: 'string', length: 255)]
    private $last_edit_by;

    #[ORM\OneToOne(targetEntity: ModeSurveillance::class, cascade: ['persist', 'remove'])]
    private $mode_de_surveillance_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModeDeSurveillance(): ?string
    {
        return $this->mode_de_surveillance;
    }

    public function setModeDeSurveillance(string $mode_de_surveillance): self
    {
        $this->mode_de_surveillance = $mode_de_surveillance;

        return $this;
    }

    public function getFuseauHoraire(): ?string
    {
        return $this->fuseau_horaire;
    }

    public function setFuseauHoraire(string $fuseau_horaire): self
    {
        $this->fuseau_horaire = $fuseau_horaire;

        return $this;
    }

    public function isServiceMail(): ?bool
    {
        return $this->service_mail;
    }

    public function setServiceMail(bool $service_mail): self
    {
        $this->service_mail = $service_mail;

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

    public function getModeDeSurveillanceId(): ?ModeSurveillance
    {
        return $this->mode_de_surveillance_id;
    }

    public function setModeDeSurveillanceId(?ModeSurveillance $mode_de_surveillance_id): self
    {
        $this->mode_de_surveillance_id = $mode_de_surveillance_id;

        return $this;
    }
}
