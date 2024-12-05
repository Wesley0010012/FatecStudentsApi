<?php

namespace App\Shared\Domain\Gateways;

interface VerifyUserByEmail
{
    public function existsByEmail(string $email): bool;
}
