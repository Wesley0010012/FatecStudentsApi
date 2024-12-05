<?php

namespace App\Shared\Domain\UseCases;

interface UseCase
{
    public function execute(mixed $input): mixed;
}
