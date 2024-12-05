<?php

namespace Tests\Unit\Authentication\Domain\Dto;

use Faker\Factory as Faker;

use App\Authentication\Domain\Dto\SignUpInputDto;
use App\Shared\Domain\Entities\FatecUser;
use App\Shared\Domain\Entities\User;
use Tests\TestCase;

class SignUpInputDtoTest extends TestCase
{
    private readonly SignUpInputDto $sut;
    private readonly array $data;

    public function setUp(): void
    {
        $faker = Faker::create();

        $this->data = [
            "fullName" => $faker->name(),
            "email" => $faker->email(),
            "password" => $faker->password(),
            "fatecUser" => $faker->userName(),
            "fatecPassword" => $faker->password()
        ];

        $this->sut = new SignUpInputDto(
            $this->data['fullName'],
            $this->data['email'],
            $this->data['password'],
            $this->data['fatecUser'],
            $this->data['fatecPassword']
        );
    }

    public function testShouldReturnTheCorrectEntityOnSuccess(): void
    {
        $this->assertEquals(new User(
            $this->data['fullName'],
            $this->data['email'],
            $this->data['password'],
            new FatecUser(
                $this->data['fatecUser'],
                $this->data['fatecPassword']
            )
        ), $this->sut->toDomain());
    }

    public function testShouldReturnTheCorrectEmail(): void
    {
        $this->assertEquals($this->data['email'], $this->sut->getEmail());
    }

    public function testShouldReturnTheCorrectPassword(): void
    {
        $this->assertEquals($this->data['password'], $this->sut->getPassword());
    }
}
