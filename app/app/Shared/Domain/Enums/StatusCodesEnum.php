<?php

namespace App\Shared\Domain\Enums;


enum StatusCodesEnum: int
{
    case MISSING_PARAM = 400;
    case CONFLICT = 409;
}
