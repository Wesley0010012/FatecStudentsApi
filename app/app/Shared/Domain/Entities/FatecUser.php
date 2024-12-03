<?php

namespace App\Shared\Domain\Entities;

class FatecUser extends Entity
{
    private readonly string $username;
    private readonly string $password;

    public function __construct(string $username, string $password, ?int $id = null)
    {
        parent::__construct($id);

        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
}
