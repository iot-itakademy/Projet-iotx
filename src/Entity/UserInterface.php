<?php

namespace App\Entity;


/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D649E7927C74", columns={"email"})})
 * @ORM\Entity
 */
interface UserInterface
{
    public function getEmail(): ?string;

    public function setEmail(string $email): \App\Entity\User;

    public function getRoles(): ?array;

    public function setRoles(array $roles): \App\Entity\User;

    public function getPassword(): ?string;

    public function setPassword(string $password): \App\Entity\User;

    public function getLastname(): ?string;

    public function setLastname(string $lastname): \App\Entity\User;

    public function getFirstname(): ?string;

    public function setFirstname(string $firstname): \App\Entity\User;

    public function getAddress(): ?string;

    public function setAddress(string $address): \App\Entity\User;

    public function getZipcode(): ?string;

    public function setZipcode(string $zipcode): \App\Entity\User;

    public function getCity(): ?string;

    public function setCity(string $city): \App\Entity\User;

    public function getCreatedAt(): ?\DateTimeImmutable;

    public function setCreatedAt(\DateTimeImmutable $createdAt): \App\Entity\User;

    public function getGoogleAuthenticatorSecret(): ?string;

    public function setGoogleAuthenticatorSecret(?string $googleAuthenticatorSecret): \App\Entity\User;
}