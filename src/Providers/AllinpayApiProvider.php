<?php

namespace Onex\Allinpay\Providers;

use Illuminate\Support\ServiceProvider;
use Onex\Allinpay\Allinpay;
use Onex\Allinpay\Port\MemberService;
use Onex\Allinpay\Port\MerchantService;
use Onex\Allinpay\Port\OrderService;
use Onex\Allinpay\Requests\MemberRequest;
use Onex\Allinpay\Requests\MerchantRequest;
use Onex\Allinpay\Requests\OrderRequest;

class AllinpayApiProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('allinpay', function () {
            return new Allinpay(config('allinpay'));
        });

        $this->app->singleton('allinpay.member', function () {
            return new MemberService(config('allinpay'), app('allinpay.member.request'));
        });
        $this->app->singleton('allinpay.merchant', function () {
            return new MerchantService(config('allinpay'), app('allinpay.merchant.request'));
        });
        $this->app->singleton('allinpay.order', function () {
            return new OrderService(config('allinpay'), app('allinpay.order.request'));
        });

        $this->app->singleton('allinpay.member.request', function () {
            return new MemberRequest();
        });
        $this->app->singleton('allinpay.merchant.request', function () {
            return new MerchantRequest();
        });
        $this->app->singleton('allinpay.order.request', function () {
            return new OrderRequest();
        });
        $this->mergeConfig();
    }


    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__ . '/../config/config.php' => app()->basePath() . '/config/allinpay.php',
        ]);
    }

    /**
     * Merges user's and entrust's configs.
     *
     * @return void
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'allinpay'
        );
    }
}
