<?php

namespace App\Services\Interfaces\Configuration;

use App\Services\Interfaces\Base\InterfaceBaseService;
use Illuminate\Http\Request;

interface InterfaceUserService extends InterfaceBaseService
{
    function login(Request $request);
}
