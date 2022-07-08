<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SensorType
 *
 * @ORM\Table(name="sensor_type", uniqueConstraints={@ORM\UniqueConstraint(name="sensor_type_id_uindex", columns={"id"}), @ORM\UniqueConstraint(name="sensor_type_type_uindex", columns={"type"})})
 * @ORM\Entity(repositoryClass="App\Repository\SensorTypeRepository")
 */
class SensorType implements SensorTypeInterface
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
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


}
