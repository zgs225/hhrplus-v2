<?php

namespace App\Models\Relations;

trait HasManyOrdersTrait
{
    public function orders() {
        return $this->hasMany('App\Models\Order');
    }

    public function deleteOrders() {
        foreach ($this->orders()->get(['id']) as $order) {
            $order->delete();
        }

    }
}