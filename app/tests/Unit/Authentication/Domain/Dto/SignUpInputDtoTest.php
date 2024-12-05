<?php

namespace Tests\Unit\Authentication\Domain\Dto;

use Faker\Factory as Faker;

use App\Authentication\Domain\Dto\SignUpInputDto;
use App\Shared\Domain\Entities\FatecUser;
use App\Shared\Domain\Entities\User;
use Tests\TestCase;

class SignUpInputDtoTest extends TestCase
{
    public function testShouldReturnTheCorrectEntityOnSuccess(): void
    {
        $faker = Faker::create();

        $data = [
            "fullName" => $faker->name(),
            "email" => $faker->email(),
            "password" => $faker->password(),
            "fatecUser" => $faker->userName(),
            "fatecPassword" => $faker->password()
        ];

        $sut = new SignUpInputDto(
            $data['fullName'],
            $data['email'],
            $data['password'],
            $data['fatecUser'],
            $data['fatecPassword']
        );

        $this->assertEquals(new User(
            $data['fullName'],
            $data['email'],
            $data['password'],
            new FatecUser(
                $data['fatecUser'],
                $data['fatecPassword']
            )
        ), $sut->toDomain());
    }
}
