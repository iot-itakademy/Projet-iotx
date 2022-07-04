<?php

namespace App\Entity;


/**
 * SurveyMode
 *
 * @ORM\Table(name="survey_mode")
 * @ORM\Entity
 */
interface SurveyModeInterface
{
    public function getParams(): ?array;

    public function setParams(array $params): \App\Entity\SurveyMode;

    public function getLastEditBy(): ?int;

    public function setLastEditBy(int $lastEditBy): \App\Entity\SurveyMode;
}