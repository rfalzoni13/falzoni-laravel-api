<?php

namespace Tests\Unit\Base;

use App\Services\Interfaces\Base\InterfaceBaseService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\UuidV4;

abstract class AbstractServiceBaseTest extends TestCase
{
    // Service's Interface
    protected InterfaceBaseService $service;

    // Abstract methods
    protected abstract function getId(): UuidV4;
    protected abstract function getService();
    protected abstract function getData(): array;
    protected abstract function getObject(): array;

    /**
     * This method is called before each test.
     *
     * @codeCoverageIgnore
     */
    protected function setUp(): void
    {
        $this->service = $this->getService();
    }

    public function test_should_be_success_when_get_all(): void
    {
        $list = $this->service->getAll();

        self::assertTrue(count($list) > 0);
    }

    public function test_should_be_success_when_get_by_id(): void
    {
        $id = $this->getId();

        $obj = $this->service->get($id);

        self::assertNotEmpty($obj);
    }

    public function test_should_be_success_when_create(): void
    {
        $obj = $this->getObject();

        $this->service->create($obj);

        self::assertNotEmpty($obj);
    }

    public function test_should_be_success_when_update(): void
    {
        $obj = $this->getObject();

        $this->service->update($obj);

        self::assertNotEmpty($obj);
    }

    public function test_should_be_success_when_delete(): void
    {
        $id = $this->getId();

        $obj = $this->service->delete($id);

        self::assertEmpty($obj);
    }
}
