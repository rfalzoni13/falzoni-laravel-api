<?php

namespace App\Services\Classes\Configuration;

use App\Repositories\Interfaces\Configuration\InterfaceUserRepository;
use App\Services\Classes\Base\AbstractBaseService;
use App\Services\Interfaces\Configuration\InterfaceUserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserService extends AbstractBaseService implements InterfaceUserService
{
    public function __construct(InterfaceUserRepository $repository)
    {
        parent::__construct($repository);
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'user_name' => ['required'],
                'password' => ['required'],
            ]);
    
            if (Auth::attempt($credentials)) {
                $token = $request->user()->createToken('Bearer Token');
                return $token;
            } else {
                throw new HttpException("Login ou senha inválidos");
            }
        } catch(Exception $ex) {
            throw $ex;
        }
    }
}
