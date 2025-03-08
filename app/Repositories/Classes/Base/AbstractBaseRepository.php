<?php

namespace App\Repositories\Classes\Base;

use App\Repositories\Interfaces\Base\InterfaceBaseRepository;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\UuidV4;

class AbstractBaseRepository implements InterfaceBaseRepository
{
    private Model $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function get(UuidV4 $id)
    {
        return $this->model->find($id);
    }

    public function create(array $model) {
        $this->model->create($model);
    }

    public function update(array $model) {
        $this->model::where('id', $model["id"])
        ->update($model);
    }

    public function delete(UuidV4 $id) {
        $this->model->where('id', $id)
        ->delete();
    }
}
