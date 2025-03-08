<?php

namespace App\Repositories\Classes\Configuration;

use App\Models\Configuration\User;
use App\Repositories\Classes\Base\AbstractBaseRepository;
use App\Repositories\Interfaces\Configuration\InterfaceUserRepository;

class UserRepository extends AbstractBaseRepository implements InterfaceUserRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
