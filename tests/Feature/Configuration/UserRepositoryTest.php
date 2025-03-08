<?php

namespace Tests\Feature\Configuration;

use App\Models\Configuration\User;
use App\Repositories\Classes\Configuration\UserRepository;
use Tests\Feature\Base\AbstractBaseRepositoryTest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

class UserRepositoryTest extends AbstractBaseRepositoryTest
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->repository = new UserRepository(new User());
        parent::setUp();
    }

    protected function getId(): UuidV4
    {
        return Uuid::v4()::fromString('1a60f57f-beb4-4d57-b4c5-98d632486344');
    }

    protected function initialize(): void
    {
        $id = $this->getId();

        User::factory()->count(3)->create();

        // Fixed id to get into 
        User::factory()->create([
            'id' => $id,
            'full_name' => fake()->name(),
            'user_name' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
    }

    protected function createObject(): array
    {
        $user = User::factory()->make();
        return $user->getAttributes();
    }

    protected function updateObject(array $obj): array 
    {
        $obj["full_name"] = "Test Updated";
        $obj["user_name"] = "Test 2";
        return $obj;
    }
}
