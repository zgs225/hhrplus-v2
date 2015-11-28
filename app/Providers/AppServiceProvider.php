<?php namespace App\Providers;

use App\Models\Order;
use App\Models\Product;
use App\Models\PackageGood;
use App\Models\Access\User\User;

use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerCascadesDeletesEvents();
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register(\Laracasts\Generators\GeneratorsServiceProvider::class);
        }

        $this->registerBinds();
    }

    protected function registerCascadesDeletesEvents() {
        $this->registerProduct();
        $this->registerPackageGood();
        $this->registerOrder();
        $this->registerUser();
    }

    protected function registerProduct() {
        Product::deleted(function ($product) {
            $product->skus()->delete();
        });

        Product::restored(function ($product) {
            $product->skus()->withTrashed()->restore();
        });
    }

    protected function registerPackageGood() {
        PackageGood::deleted(function ($packageGood) {
            $packageGood->goodItems()->delete();
        });

        PackageGood::restored(function ($packageGood) {
            $packageGood->goodItems()->withTrashed()->restore();
        });
    }

    protected function registerOrder() {
        Order::deleted(function ($order) {
            $order->orderItems()->delete();
            $order->orderStatuses()->delete();
        });

        Order::restored(function ($order) {
            $order->orderItems()->withTrashed()->restore();
            $order->orderStatuses()->withTrashed()->restore();
        });
    }

    protected function registerUser() {
        User::deleted(function ($user) {
            $user->orders()->delete();
        });

        User::restored(function ($user) {
            $user->orders()->withTrashed()->restore();
        });
    }

    protected function registerBinds() {
        $this->app->bind(
            \App\Repositories\Frontend\Commerce\OrderContract::class,
            \App\Repositories\Frontend\Commerce\EloquentOrderRepository::class
        );

        $this->app->bind(
          \App\Repositories\Common\SmsGatewayContract::class,
          function() {
            return new \App\Repositories\Common\SmsGateway(
              config('sms.url'),
              config('sms.apiKey')
            );
          }
        );
    }
}
