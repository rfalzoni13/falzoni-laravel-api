<?php

namespace App\Repositories\Classes\Stock;

use App\Models\Stock\Product;
use App\Repositories\Classes\Base\AbstractBaseRepository;
use App\Repositories\Interfaces\Stock\InterfaceProductRepository;

class ProductRepository extends AbstractBaseRepository implements InterfaceProductRepository
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }
}
