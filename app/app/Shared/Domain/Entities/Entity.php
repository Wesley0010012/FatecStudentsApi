<?php

namespace App\Shared\Domain\Entities;

abstract class Entity
{
    private readonly int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
}