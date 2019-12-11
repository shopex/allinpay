<?php
namespace Onex\Allinpay;

use Onex\Allinpay\Common\AllinpayClient;

class Allinpay extends AllinpayClient
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
        return app('allinpay.' . $method);
    }
}