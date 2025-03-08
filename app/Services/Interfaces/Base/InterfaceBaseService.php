<?php

namespace App\Services\Interfaces\Base;
use Symfony\Component\Uid\UuidV4;

interface InterfaceBaseService
{
    function getAll();
    function get(UuidV4 $id);
    function create(array $obj);
    function update(array $obj);
    function delete(UuidV4 $id);
}
