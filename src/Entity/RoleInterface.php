<?php

namespace App\Entity;


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