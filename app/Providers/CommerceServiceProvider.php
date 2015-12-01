<?php

namespace app\Providers;

use Illuminate\Support\ServiceProvider;


class CommerceServiceProvider extends ServiceProvider
{

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->registerBinds();
  }

  private function registerBinds()
  {
    $this->app->bind(
      \App\Repositories\Backend\Order\OrderContract::class,
      \App\Repositories\Backend\Order\EloquentOrderRepository::class
    );
  }
}