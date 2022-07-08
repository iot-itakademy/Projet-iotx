<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SurveyMode
 *
 * @ORM\Table(name="survey_mode")
 * @ORM\Entity(repositoryClass="App\Repository\SurveyModeRepository")
 */
class SurveyMode implements SurveyModeInterface
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
     * @var int
     *
     * @ORM\Column(name="last_edit_by", type="integer", nullable=false)
     */
    private $lastEditBy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

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

    public function getLastEditBy(): ?int
    {
        return $this->lastEditBy;
    }

    public function setLastEditBy(int $lastEditBy): self
    {
        $this->lastEditBy = $lastEditBy;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }


}
