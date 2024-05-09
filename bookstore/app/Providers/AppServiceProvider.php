<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Book\BookRepository;
use App\Domain\Store\StoreRepository as StoreRepository;
use App\Infrastructure\Book\EloquentBookRepository;
use App\Infrastructure\Store\EloquentStoreRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BookRepository::class, EloquentBookRepository::class);
        $this->app->bind(StoreRepository::class, EloquentStoreRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
