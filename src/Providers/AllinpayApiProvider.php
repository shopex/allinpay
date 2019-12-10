<?php

namespace Tonglian\Allinpay\Providers;

use Illuminate\Support\ServiceProvider;
use Tonglian\Allinpay\Allinpay;
use Tonglian\Allinpay\Port\MemberService;
use Tonglian\Allinpay\Port\MerchantService;
use Tonglian\Allinpay\Port\OrderService;
use Tonglian\Allinpay\Requests\MemberRequest;
use Tonglian\Allinpay\Requests\MerchantRequest;
use Tonglian\Allinpay\Requests\OrderRequest;

class AllinpayApiProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('allinpay.member', function () {
            return new MemberService(config('allinpay'));
        });
        $this->app->singleton('allinpay.merchant', function () {
            return new MerchantService(config('allinpay'));
        });
        $this->app->singleton('allinpay.order', function () {
            return new OrderService(config('allinpay'));
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
