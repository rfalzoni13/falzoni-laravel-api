<?php

namespace App\Repositories\Interfaces\Base;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\UuidV4;

interface InterfaceBaseRepository
{
    function getAll();
    function get(UuidV4 $id);
    function create(array $model);
    function update(array $model);
    function delete(UuidV4 $id);
}
