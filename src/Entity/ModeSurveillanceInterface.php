<?php

namespace App\Entity;

interface ModeSurveillanceInterface
{
    public function getLibelle(): ?string;

    public function setLibelle(string $libelle): \App\Entity\ModeSurveillance;

    public function getParameters(): ?string;

    public function setParameters(string $parameters): \App\Entity\ModeSurveillance;
}