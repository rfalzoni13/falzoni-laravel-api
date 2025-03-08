<?php

namespace App\Services\Classes\Stock;

use App\Repositories\Interfaces\Stock\InterfaceProductRepository;
use App\Services\Classes\Base\AbstractBaseService;
use App\Services\Interfaces\Stock\InterfaceProductService;

class ProductService extends AbstractBaseService implements InterfaceProductService
{
    public function __construct(InterfaceProductRepository $repository)
    {
        parent::__construct($repository);
    }
}
