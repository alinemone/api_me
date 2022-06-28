<?php

namespace App\Classes;

use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Payment;

class Gateway extends Payment
{
    public function __construct(array $config = [])
    {
        $config = config('payment');
        $this->invoice(new Invoice());
        $this->config = empty($config) ? $this->loadDefaultConfig() : $config;
        $this->via($this->config['default']);
        parent::__construct($config);
    }

    /**
     * Set callbackUrl.
     *
     * @param $url |null
     * @return $this
     */
    public function callbackUrl($url = null)
    {
        $this->callbackUrl = $url;

        return $this;
    }
}
