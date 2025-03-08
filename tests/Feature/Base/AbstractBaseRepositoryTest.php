<?php

namespace Tests\Feature\Base;

use App\Repositories\Interfaces\Base\InterfaceBaseRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;
use Tests\TestCase;

abstract class AbstractBaseRepositoryTest extends TestCase
{
    use RefreshDatabase;

    // Repository's Interface
    protected InterfaceBaseRepository $repository;

    // Protected Methods
    protected abstract function initialize(): void;
    protected abstract function getId(): UuidV4;
    protected abstract function createObject(): array;
    protected abstract function updateObject(array $obj): array;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->initialize();
    }

   // Test
    public function test_should_be_success_when_get_all(): void
    {
        $list = $this->repository->getAll();

        self::assertTrue($list->count() > 0);
    }

    public function test_should_be_success_when_get_by_id(): void
    {
        $id = $this->getId();

        $obj = $this->repository->get($id);

        self::assertNotEmpty($obj);
    }

    public function test_should_be_empty_when_get_by_id(): void
    {
        // Random ID
        $id = Uuid::v4()::fromString("994b5576-fa4c-49a6-bcc7-166c4f095cda");

        $obj = $this->repository->get($id);

        self::assertEmpty($obj);
    }

    public function test_should_be_success_when_create(): void
    {
        $obj = $this->createObject();

        $this->repository->create($obj);

        self::assertNotEmpty($obj);
    }

    public function test_should_be_success_when_update(): void
    {
        $id = $this->getId();

        $obj = $this->repository->get($id);

        $obj = $this->updateObject($obj->getAttributes());

        $this->repository->update($obj);

        self::assertNotEmpty($obj);
    }

    public function test_should_be_success_when_delete(): void
    {
        $id = $this->getId();

        $obj = $this->repository->delete($id);

        self::assertEmpty($obj);
    }
}
