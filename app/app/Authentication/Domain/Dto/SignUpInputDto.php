<?php

namespace App\Authentication\Domain\Dto;

use App\Shared\Domain\Dto\InputDto;
use App\Shared\Domain\Entities\Entity;
use App\Shared\Domain\Entities\FatecUser;
use App\Shared\Domain\Entities\User;

class SignUpInputDto extends InputDto
{
    public function __construct(
        private readonly string $fullName,
        private readonly string $email,
        private readonly string $password,
        private readonly string $fatecUsername,
        private readonly string $fatecPassword,
    ) {}

    public function getEmail(): string
    {
        return $this->email;
    }

    public function toDomain(): Entity
    {
        return new User(
            $this->fullName,
            $this->email,
            $this->password,
            new FatecUser(
                $this->fatecUsername,
                $this->fatecPassword
            )
        );
    }
}