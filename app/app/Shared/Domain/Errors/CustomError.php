<?php

namespace App\Shared\Domain\Errors;

use App\Shared\Domain\Enums\StatusCodesEnum;
use Exception;

class CustomError extends Exception
{
    public function __construct(string $message, private readonly StatusCodesEnum $statusCode)
    {
        parent::__construct($message);
    }

    public function getStatusCode(): StatusCodesEnum
    {
        return $this->statusCode;
    }
}
