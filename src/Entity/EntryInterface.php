<?php

namespace App\Entity;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping as ORM;
/**
 * Entry
 *
 * @ORM\Table(name="entry", uniqueConstraints={@ORM\UniqueConstraint(name="table_name_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
interface EntryInterface
{
    public function getId(): ?int;

    public function getDate(): ?\DateTimeInterface;

    public function setDate(\DateTimeInterface $date): \App\Entity\Entry;

    public function getType(): ?string;

    public function setType(string $type): \App\Entity\Entry;

    public function getFileName(): ?string;

    public function setFileName(string $fileName): \App\Entity\Entry;
}