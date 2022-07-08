<?php

namespace App\Entity;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping as ORM;
/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity
 */
interface RoleInterface
{
    public function getType(): ?string;

    public function setType(string $type): \App\Entity\Role;
}