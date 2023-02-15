<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\impl\UserServiceImpl;
use App\Services\UserService;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        UserService::class => UserServiceImpl::class
    ];

    public function provides(): array
    {
        return [UserService::class];
    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
