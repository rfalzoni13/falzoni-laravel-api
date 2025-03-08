<?php

namespace Tests\Feature\Stock;

use App\Models\Stock\Product;
use App\Repositories\Classes\Stock\ProductRepository;
use Tests\Feature\Base\AbstractBaseRepositoryTest;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

class ProductRepositoryTest extends AbstractBaseRepositoryTest
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->repository = new ProductRepository(new Product());
        parent::setUp();
    }

    protected function getId(): UuidV4
    {
        return Uuid::v4()::fromString('f03e1f23-23fc-4cea-aefd-3f4115c11d72');
    }

    protected function initialize(): void
    {
        $id = $this->getId();

        Product::factory()->count(3)->create();
        Product::factory()->create([
            'id' => $id,
            'name' => fake()->name(),
            'price' => fake()->randomNumber(2),
            'discount' => fake()->randomNumber(2)
        ]);
    }

    protected function createObject(): array
    {
        $product = Product::factory()->make();
        return $product->getAttributes();
    }

    protected function updateObject(array $obj): array 
    {
        $obj["name"] = "Test Updated";
        $obj["price"] = 10.00;
        return $obj;
    }
}
