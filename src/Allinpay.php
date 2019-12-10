<?php
namespace Tonglian\Allinpay;

use Tonglian\Allinpay\Port\MerchantService;

class Allinpay
{

    /**
     * Dynamically call the Allinpay instance.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return new MerchantService(config('allinpay'));
    }
}