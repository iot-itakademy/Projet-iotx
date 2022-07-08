<?php

namespace App\Entity;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping as ORM;
/**
 * SensorType
 *
 * @ORM\Table(name="sensor_type", uniqueConstraints={@ORM\UniqueConstraint(name="sensor_type_id_uindex", columns={"id"}), @ORM\UniqueConstraint(name="sensor_type_type_uindex", columns={"type"})})
 * @ORM\Entity
 */
interface SensorTypeInterface
{
    public function getType(): ?string;

    public function setType(string $type): \App\Entity\SensorType;
}