<?php

namespace Tests\Feature\Register;

use App\Models\Register\Customer;
use App\Repositories\Classes\Register\CustomerRepository;
use Tests\Feature\Base\AbstractBaseRepositoryTest;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

class CustomerRepositoryTest extends AbstractBaseRepositoryTest
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->repository = new CustomerRepository(new Customer());
        parent::setUp();
    }

    protected function getId(): UuidV4
    {
        return Uuid::v4()::fromString('1a4aa1f2-dd17-41e4-80de-14a634d1cf1f');
    }

    protected function initialize(): void
    {
        $id = $this->getId();

        Customer::factory()
            ->count(3)
            ->create();

        // Fixed id to get into
        Customer::factory()->create([
            'id' => $id,
            'name' => fake()->name(),
            'document' => fake()->sentence(14)
        ]);
    }

    protected function createObject(): array
    {
        $customer = Customer::factory()->make();
        return $customer->getAttributes();
    }

    protected function updateObject(array $obj): array 
    {
        $obj["name"] = "Test Updated";
        $obj["document"] = "123.456.789-00";
        return $obj;
    }
}
