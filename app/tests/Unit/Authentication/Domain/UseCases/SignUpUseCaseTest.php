<?php

namespace Tests\Unit\Authentication\Domain\UseCases;

use Faker\Factory as Faker;

use App\Authentication\Domain\Dto\SignUpInputDto;
use App\Authentication\Domain\Errors\UserExistsError;
use App\Authentication\Domain\UseCases\SignUpUseCase;
use App\Shared\Domain\Gateways\VerifyUserByEmail;
use Exception;
use Tests\TestCase;

class SignUpUseCaseTest extends TestCase
{
    private readonly SignUpUseCase $sut;

    private readonly VerifyUserByEmail $verifyUserByEmail;

    private function mockInput(): SignUpInputDto
    {
        $faker = Faker::create();

        $data = [
            "fullName" => $faker->name(),
            "email" => $faker->email(),
            "password" => $faker->password(),
            "passwordConfirmation" => $faker->password(),
            "fatecUser" => $faker->userName(),
            "fatecPassword" => $faker->password()
        ];

        return new SignUpInputDto(
            $data['fullName'],
            $data['email'],
            $data['password'],
            $data['passwordConfirmation'],
            $data['fatecUser'],
            $data['fatecPassword']
        );
    }

    public function setUp(): void
    {
        $this->verifyUserByEmail = $this->createMock(VerifyUserByEmail::class);

        $this->sut = new SignUpUseCase($this->verifyUserByEmail);
    }

    public function testShouldThrowIfVerifyUserByEmailThrows(): void
    {
        $this->verifyUserByEmail->method('existsByEmail')
            ->willThrowException(new Exception());

        $this->expectException(Exception::class);

        $this->sut->execute($this->mockInput());
    }

    public function testShouldVerifyUserByEmailHaveBeenCalledWithCorrectEmail(): void
    {
        $input = $this->mockInput();

        $this->verifyUserByEmail->expects($this->once())
            ->method('existsByEmail')
            ->with($input->getEmail());

        $this->sut->execute($input);
    }

    public function testShouldThrowUserExistsErrorIfUserExists(): void
    {
        $this->verifyUserByEmail->method('existsByEmail')
            ->willReturn(true);

        $this->expectException(UserExistsError::class);

        $this->sut->execute($this->mockInput());
    }
}
