<?php

namespace Tests\Unit\Shared\Domain\Dto;

use Faker\Factory as Faker;

use App\Shared\Domain\Dto\InputDto;
use App\Shared\Domain\Entities\Entity;
use Tests\TestCase;

class TestEntity extends Entity
{
    private readonly string $a;
    private readonly int $b;

    public function __construct(string $a, int $b)
    {
        parent::__construct(null);

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

class TestInputDto extends InputDto
{
    public function __construct(private string $a, private int $b) {}

    public function toDomain(): Entity
    {
        return new TestEntity($this->a, $this->b);
    }
}

class InputDtoTest extends TestCase
{
    private readonly Entity $generatedEntity;
    private readonly TestInputDto $sut;

    public function setUp(): void
    {
        $faker = Faker::create();

        $a = $faker->randomLetter();
        $b = $faker->randomNumber();

        $this->generatedEntity = new TestEntity($a, $b);

        $this->sut = new TestInputDto($a, $b);
    }

    public function testShouldReturnACorrectEntity(): void
    {
        $this->assertEquals($this->generatedEntity, $this->sut->toDomain());
    }
}
