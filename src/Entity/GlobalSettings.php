<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GlobalSettings
 *
 * @ORM\Table(name="global_settings", indexes={@ORM\Index(name="global_settings_user_id_fk", columns={"last_edit_by"})})
 * @ORM\Entity(repositoryClass="App\Repository\GlobalSettingsRepository")
 */
class GlobalSettings implements GlobalSettingsInterface
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
     * @ORM\Column(name="time_zone", type="string", length=150, nullable=false)
     */
    private $timeZone;

    /**
     * @var int
     *
     * @ORM\Column(name="last_edit_by", type="integer", nullable=false)
     */
    private $lastEditBy;

    /**
     * @ORM\Column(type="boolean")
     */
    private $alert_mail;

    /**
     * @ORM\OneToOne(targetEntity=SurveyMode::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $SurveyMode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTimeZone(): ?string
    {
        return $this->timeZone;
    }

    public function setTimeZone(string $timeZone): self
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    public function getLastEditBy(): ?int
    {
        return $this->lastEditBy;
    }

    public function setLastEditBy(int $lastEditBy): self
    {
        $this->lastEditBy = $lastEditBy;

        return $this;
    }

    public function isAlertMail(): ?bool
    {
        return $this->alert_mail;
    }

    public function setAlertMail(bool $alert_mail): self
    {
        $this->alert_mail = $alert_mail;

        return $this;
    }

    public function getSurveyMode(): ?SurveyMode
    {
        return $this->SurveyMode;
    }

    public function setSurveyMode(SurveyMode $SurveyMode): self
    {
        $this->SurveyMode = $SurveyMode;

        return $this;
    }


}
