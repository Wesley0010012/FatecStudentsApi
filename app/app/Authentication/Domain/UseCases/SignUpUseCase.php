<?php

namespace App\Authentication\Domain\UseCases;

use App\Authentication\Domain\Dto\SignUpInputDto;
use App\Shared\Domain\Gateways\VerifyUserByEmail;
use App\Shared\Domain\UseCases\UseCase;

class SignUpUseCase implements UseCase
{
    public function __construct(
        private readonly VerifyUserByEmail $verifyUserByEmail
    ) {}

    public function execute(mixed $input): mixed
    {
        $signInInput = (fn($i): SignUpInputDto => $i)($input);

        $this->verifyUserByEmail->existsByEmail($signInInput->getEmail());

        return null;
    }
}
