<?php

namespace Tests\Unit\Configuration;

use App\Repositories\Classes\Configuration\UserRepository;
use App\Services\Classes\Configuration\UserService;
use App\Services\Interfaces\Configuration\InterfaceUserService;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;
use Tests\Unit\Base\AbstractServiceBaseTest;

class UserServiceTest extends AbstractServiceBaseTest
{
    protected function getService(): InterfaceUserService
    {
        $users = $this->getData();

        $mockRepository = self::createMock(UserRepository::class);
        $mockRepository
            ->method("getAll")
            ->willReturn($users);

        $mockRepository
            ->method("get")
            ->with($this->getId())
            ->willReturn($users[0]);

        $mockRepository
            ->method("create")
            ->withAnyParameters()
            ->willReturnSelf();

        $mockRepository
            ->method("update")
            ->withAnyParameters()
            ->willReturnSelf();

        $mockRepository
            ->method("delete")
            ->withAnyParameters()
            ->willReturnSelf();

        return new UserService($mockRepository);
    }

    protected function getId(): UuidV4
    {
        return Uuid::v4()::fromString("7f3ed8f7-07db-4391-8fdd-5ee54f176ee9");
    }

    protected function getData(): array
    {
        $i = 0;
        do {
            $users[] = [
                'full_name' => fake()->name(),
                'user_name' => fake()->userName(),
                'email' => fake()->unique()->safeEmail(),
                'phone_number' => fake()->phoneNumber(),
                'password' => fake()->password(),
            ];
            $i++;
        } while ($i < 3);

        return $users;
    }

    protected function getObject(): array
    {
        return [
            'full_name' => fake()->name(),
            'user_name' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => fake()->password(),
        ];
    }
}
