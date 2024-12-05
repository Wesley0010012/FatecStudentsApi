<?php

namespace App\Authentication\Domain\UseCases;

use App\Authentication\Domain\Dto\SignUpInputDto;
use App\Authentication\Domain\Errors\UserExistsError;
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

        if ($this->verifyUserByEmail->existsByEmail($signInInput->getEmail())) {
            throw new UserExistsError();
        }

        return null;
    }
}
