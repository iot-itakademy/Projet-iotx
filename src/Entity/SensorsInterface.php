<?php

namespace App\Entity;


/**
 * Sensors
 *
 * @ORM\Table(name="sensors", indexes={@ORM\Index(name="sensors_sensor_type_id_fk", columns={"type_id"})})
 * @ORM\Entity
 */
interface SensorsInterface
{
    public function getParams(): ?array;

    public function setParams(array $params): \App\Entity\Sensors;

    public function getName(): ?string;

    public function setName(string $name): \App\Entity\Sensors;

    public function getLastEditBy(): ?int;

    public function setLastEditBy(int $lastEditBy): \App\Entity\Sensors;

    public function getType(): ?SensorType;

    public function setType(?SensorType $type): \App\Entity\Sensors;
}