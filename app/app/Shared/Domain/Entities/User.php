<?php

namespace App\Shared\Domain\Entities;

class User extends Entity
{
    private readonly string $fullName;
    private readonly string $email;
    private readonly string $password;
    private readonly ?string $apiToken;
    private readonly FatecUser $fatecUser;

    public function __construct(string $fullName, string $email, string $password, FatecUser $fatecUser, ?string $apiToken = null, ?int $id = null)
    {
        parent::__construct($id);
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
        $this->apiToken = $apiToken;
        $this->fatecUser = $fatecUser;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
