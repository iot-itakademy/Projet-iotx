<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sensors
 *
 * @ORM\Table(name="sensors", indexes={@ORM\Index(name="sensors_sensor_type_id_fk", columns={"type_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\SensorRepository")
 */
class Sensors implements SensorsInterface
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
     * @var array
     *
     * @ORM\Column(name="params", type="json", nullable=false)
     */
    private $params;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="last_edit_by", type="integer", nullable=false)
     */
    private $lastEditBy;

    /**
     * @var \SensorType
     *
     * @ORM\ManyToOne(targetEntity="SensorType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * })
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParams(): ?array
    {
        return $this->params;
    }

    public function setParams(array $params): self
    {
        $this->params = $params;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getType(): ?SensorType
    {
        return $this->type;
    }

    public function setType(?SensorType $type): self
    {
        $this->type = $type;

        return $this;
    }


}
