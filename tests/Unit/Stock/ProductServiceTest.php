<?php

namespace Tests\Unit\Stock;

use App\Repositories\Classes\Stock\ProductRepository;
use App\Services\Classes\Stock\ProductService;
use App\Services\Interfaces\Stock\InterfaceProductService;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;
use Tests\Unit\Base\AbstractServiceBaseTest;

class ProductServiceTest extends AbstractServiceBaseTest
{
    protected function getService(): InterfaceProductService
    {
        $products = $this->getData();

        $mockRepository = self::createMock(ProductRepository::class);
        $mockRepository
            ->method("getAll")
            ->willReturn($products);

        $mockRepository
            ->method("get")
            ->with($this->getId())
            ->willReturn($products[0]);

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

        return new ProductService($mockRepository);
    }

    protected function getId(): UuidV4
    {
        return Uuid::v4()::fromString("f03e1f23-23fc-4cea-aefd-3f4115c11d72");
    }

    protected function getData(): array
    {
        $i = 0;
        do {
            $products[] = [
                'name' => fake()->name(),
                'price' => fake()->randomNumber(2),
                'discount' => fake()->randomNumber(2)
            ];
            $i++;
        } while ($i < 3);

        return $products;
    }

    protected function getObject(): array
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->randomNumber(2),
            'discount' => fake()->randomNumber(2)
        ];
    }
}
