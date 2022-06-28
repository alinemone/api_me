<?php

namespace App\Classes;

use App\Models\Order;
use Shetabit\Multipay\Invoice;

class Factor extends Invoice
{

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->setAmount();
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getOrderId()
    {
        return $this->order->id;
    }

    private function setAmount()
    {
        $this->amount($this->order->price);
    }


}
