<?php

namespace App\Entity;


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