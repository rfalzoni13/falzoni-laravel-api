<?php

namespace App\Providers;

use App\Repositories\Classes\Base\AbstractBaseRepository;
use App\Repositories\Classes\Configuration\UserRepository;
use App\Repositories\Classes\Register\CustomerRepository;
use App\Repositories\Classes\Stock\ProductRepository;
use App\Repositories\Interfaces\Base\InterfaceBaseRepository;
use App\Repositories\Interfaces\Configuration\InterfaceUserRepository;
use App\Repositories\Interfaces\Register\InterfaceCustomerRepository;
use App\Repositories\Interfaces\Stock\InterfaceProductRepository;
use App\Services\Classes\Base\AbstractBaseService;
use App\Services\Classes\Configuration\UserService;
use App\Services\Classes\Register\CustomerService;
use App\Services\Classes\Stock\ProductService;
use App\Services\Interfaces\Base\InterfaceBaseService;
use App\Services\Interfaces\Configuration\InterfaceUserService;
use App\Services\Interfaces\Register\InterfaceCustomerService;
use App\Services\Interfaces\Stock\InterfaceProductService;
use Illuminate\Support\ServiceProvider;

class InjectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(InterfaceBaseRepository::class, AbstractBaseRepository::class);

        $this->app->bind(InterfaceUserRepository::class, UserRepository::class);
        $this->app->bind(InterfaceCustomerRepository::class, CustomerRepository::class);
        $this->app->bind(InterfaceProductRepository::class, ProductRepository::class);

        $this->app->bind(InterfaceBaseService::class, AbstractBaseService::class);

        $this->app->bind(InterfaceUserService::class, UserService::class);
        $this->app->bind(InterfaceCustomerService::class, CustomerService::class);
        $this->app->bind(InterfaceProductService::class, ProductService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
