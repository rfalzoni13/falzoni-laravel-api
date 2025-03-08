<?php

namespace App\Services\Classes\Base;

use App\Repositories\Interfaces\Base\InterfaceBaseRepository;
use App\Services\Interfaces\Base\InterfaceBaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\Uid\UuidV4;

class AbstractBaseService implements InterfaceBaseService
{
    private InterfaceBaseRepository $repository;

    public function __construct(InterfaceBaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function get(UuidV4 $id)
    {
        return $this->repository->get($id);
    }

    public function create(array $obj)
    {
        $this->repository->create($obj);
    }

    public function update(array $obj)
    {
        $this->repository->update($obj);
    }
    public function delete(UuidV4 $id)
    {
        $this->repository->delete($id);
    }
}
