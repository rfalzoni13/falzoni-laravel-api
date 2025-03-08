<?php

namespace Tests\Unit\Register;

use App\Repositories\Classes\Register\CustomerRepository;
use App\Services\Classes\Register\CustomerService;
use App\Services\Interfaces\Register\InterfaceCustomerService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

class CustomerServiceTest extends TestCase
{
    protected function getService(): InterfaceCustomerService
    {
        $customers = $this->getData();

        $mockRepository = self::createMock(CustomerRepository::class);
        $mockRepository
            ->method("getAll")
            ->willReturn($customers);

        $mockRepository
            ->method("get")
            ->with($this->getId())
            ->willReturn($customers[0]);

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

        return new CustomerService($mockRepository);
    }

    protected function getId(): UuidV4
    {
        return Uuid::v4()::fromString("1a4aa1f2-dd17-41e4-80de-14a634d1cf1f");
    }

    protected function getData(): array
    {
        $i = 0;
        do {
            $customers[] = [
                'name' => fake()->name(),
                'document' => fake()->sentence(14)
            ];
            $i++;
        } while ($i < 3);

        return $customers;
    }

    protected function getObject(): array
    {
        return [
            'name' => fake()->name(),
            'document' => fake()->sentence(14)
        ];
    }
}
