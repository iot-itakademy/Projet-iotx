<?php

namespace App\Entity;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping as ORM;
/**
 * Badges
 *
 * @ORM\Table(name="badges")
 * @ORM\Entity
 */
interface BadgesInterface
{
    public function getUserId(): ?int;

    public function setUserId(?int $userId): \App\Entity\Badges;

    public function getToken(): ?int;

    public function setToken(?int $token): \App\Entity\Badges;
}