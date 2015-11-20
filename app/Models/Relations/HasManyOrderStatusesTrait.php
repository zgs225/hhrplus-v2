<?php

namespace App\Models\Relations;

trait HasManyOrderStatusesTrait
{
    public function orderStatuses() {
        return $this->hasMany('App\Models\OrderStatus');
    }

    public function deleteOrderStatuses() {
        foreach ($this->orderStatuses()->get(['id']) as $orderStatus) {
            $orderStatus->delete();
        }

    }
}