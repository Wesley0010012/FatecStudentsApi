<?php

namespace Tests\Unit\Shared\Domain\Entities;

use App\Shared\Domain\Entities\FatecUser;
use Faker\Factory as Faker;

use App\Shared\Domain\Entities\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    private readonly User $sut;

    private readonly array $defaultData;

    public function setUp(): void
    {
        $faker = Faker::create();

        $this->defaultData = [
            'fullName' => $faker->name(),
            'email' => $faker->email(),
            'password' => $faker->password(),
            'fatecUser' => new FatecUser($faker->userName(), $faker->password()),
            'apiToken' => $faker->regexify('[A-Za-z0-9]{60}')
        ];

        $this->sut = new User(
            $this->defaultData['fullName'],
            $this->defaultData['email'],
            $this->defaultData['password'],
            $this->defaultData['fatecUser'],
            $this->defaultData['apiToken']
        );
    }

    public function testShouldReturnTheFullName(): void
    {
        $this->assertEquals($this->sut->getFullName(), $this->defaultData['fullName']);
    }

    public function testShouldReturnTheEmail(): void
    {
        $this->assertEquals($this->sut->getEmail(), $this->defaultData['email']);
    }

    public function testShouldReturnThePassword(): void
    {
        $this->assertEquals($this->sut->getPassword(), $this->defaultData['password']);
    }
}
