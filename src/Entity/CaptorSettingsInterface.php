<?php

namespace App\Entity;

interface CaptorSettingsInterface
{
    public function getParameters(): ?array;

    public function setParameters(array $parameters): \App\Entity\CaptorSettings;

    public function getPort(): ?int;

    public function setPort(int $port): \App\Entity\CaptorSettings;

    public function getLibelle(): ?string;

    public function setLibelle(string $libelle): \App\Entity\CaptorSettings;

    public function getLastEditBy(): ?string;

    public function setLastEditBy(string $last_edit_by): \App\Entity\CaptorSettings;
}