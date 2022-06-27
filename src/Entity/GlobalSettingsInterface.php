<?php

namespace App\Entity;

interface GlobalSettingsInterface
{
    public function getModeDeSurveillance(): ?string;

    public function setModeDeSurveillance(string $mode_de_surveillance): \App\Entity\GlobalSettings;

    public function getFuseauHoraire(): ?string;

    public function setFuseauHoraire(string $fuseau_horaire): \App\Entity\GlobalSettings;

    public function isServiceMail(): ?bool;

    public function setServiceMail(bool $service_mail): \App\Entity\GlobalSettings;

    public function getLastEditBy(): ?string;

    public function setLastEditBy(string $last_edit_by): \App\Entity\GlobalSettings;
}