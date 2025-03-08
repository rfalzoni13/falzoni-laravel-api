<?php

namespace App\Services\Classes\Register;

use App\Repositories\Interfaces\Register\InterfaceCustomerRepository;
use App\Services\Classes\Base\AbstractBaseService;
use App\Services\Interfaces\Register\InterfaceCustomerService;

class CustomerService extends AbstractBaseService implements InterfaceCustomerService
{
    public function __construct(InterfaceCustomerRepository $repository)
    {
        parent::__construct($repository);
    }
}
