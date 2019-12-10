<?php
namespace Onex\Allinpay;

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
        return app('allinpay.' . $method);
    }
}