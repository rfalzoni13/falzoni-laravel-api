<?php

namespace App\Repositories\Classes\Register;

use App\Models\Register\Customer;
use App\Repositories\Classes\Base\AbstractBaseRepository;
use App\Repositories\Interfaces\Register\InterfaceCustomerRepository;

class CustomerRepository extends AbstractBaseRepository implements InterfaceCustomerRepository
{
    public function __construct(Customer $customer)
    {
        parent::__construct($customer);
    }
}
