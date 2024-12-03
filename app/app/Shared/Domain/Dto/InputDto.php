<?php

namespace App\Shared\Domain\Dto;

use App\Shared\Domain\Entities\Entity;

abstract class InputDto
{
    public abstract function toDomain(): Entity;
}
