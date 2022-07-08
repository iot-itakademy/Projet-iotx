<?php

namespace App\Entity;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping as ORM;
/**
 * GlobalSettings
 *
 * @ORM\Table(name="global_settings", indexes={@ORM\Index(name="global_settings_user_id_fk", columns={"last_edit_by"})})
 * @ORM\Entity(repositoryClass="App\Repository\GlobalSettingsRepository")
 */
interface GlobalSettingsInterface
{
    public function getId(): ?int;

    public function getTimeZone(): ?string;

    public function setTimeZone(string $timeZone): \App\Entity\GlobalSettings;

    public function getLastEditBy(): ?int;

    public function setLastEditBy(int $lastEditBy): \App\Entity\GlobalSettings;

    public function isAlertMail(): ?bool;

    public function setAlertMail(bool $alert_mail): \App\Entity\GlobalSettings;

    public function getSurveyMode(): ?SurveyMode;

    public function setSurveyMode(SurveyMode $SurveyMode): \App\Entity\GlobalSettings;
}