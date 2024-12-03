<?php

namespace Tests\Unit\Shared\Domain\Entities;

use App\Shared\Domain\Entities\Entity;
use Tests\TestCase;

class TestEntity extends Entity
{
    private readonly string $a;
    private readonly int $b;

    public function __construct(int $id, string $a, int $b)
    {
        parent::__construct($id);

        $this->a = $a;
        $this->b = $b;
    }

    public function getA(): string
    {
        return $this->a;
    }

    public function getB(): int
    {
        return $this->b;
    }
}

class EntityTest extends TestCase
{
    private readonly TestEntity $sut;

    public function setUp(): void
    {
        $this->sut = new TestEntity(1, 'a', 10);
    }

    public function testShouldReturnACorrectIdOnSuccess()
    {
        $this->assertEquals($this->sut->getId(), 1);
    }

    public function testShouldReturnAOnSuccess(): void
    {
        $this->assertEquals($this->sut->getA(), 'a');
    }

    public function testShouldReturnBOnSuccess(): void
    {
        $this->assertEquals($this->sut->getB(), 10);
    }
}
