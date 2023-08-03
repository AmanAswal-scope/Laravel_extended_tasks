<?php

namespace BM\Books;

use Illuminate\Support\ServiceProvider;

class BooksServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->make('\BM\Books\Http\Controllers\AuthController');
    $this->loadViewsFrom(__DIR__ . '/views', 'books');
    $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    $this->publishes([
      __DIR__ . '/../public' => public_path('vendor/books'),
    ], 'public');

    $kernel = app()->make(\App\Http\Kernel::class);
    $kernel->pushMiddleware(\BM\Books\Http\Middleware\user_check::class);

  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    include __DIR__ . '/routes/web.php';
  }
}
