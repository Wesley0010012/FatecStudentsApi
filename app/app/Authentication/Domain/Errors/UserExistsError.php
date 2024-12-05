<?php

namespace App\Authentication\Domain\Errors;

use App\Shared\Domain\Enums\StatusCodesEnum;
use App\Shared\Domain\Errors\CustomError;

class UserExistsError extends CustomError
{
    public function __construct()
    {
        parent::__construct('User exists with this email', StatusCodesEnum::CONFLICT);
    }
}
