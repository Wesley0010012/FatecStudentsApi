<?php

namespace Tests\Unit\Shared\Domain\Entities;

use Faker\Factory as Faker;

use App\Shared\Domain\Entities\FatecUser;
use Tests\TestCase;

class FatecUserTest extends TestCase
{
    private readonly FatecUser $sut;

    private readonly array $defaultData;

    public function setUp(): void
    {
        $faker = Faker::create();

        $this->defaultData = [
            'username' => $faker->userName(),
            'password' => $faker->password(),
        ];

        $this->sut = new FatecUser($this->defaultData['username'], $this->defaultData['password']);
    }

    public function testShouldReturnTheCorrectUsername(): void
    {
        $this->assertEquals($this->sut->getUsername(), $this->defaultData['username']);
    }

    public function testShouldReturnTheCorrectPassword(): void
    {
        $this->assertEquals($this->sut->getPassword(), $this->defaultData['password']);
    }
}
