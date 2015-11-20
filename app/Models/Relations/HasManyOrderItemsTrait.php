<?php

namespace app\Models\Relations;

trait HasManyOrderItemsTrait
{
    public function orderItems() {
        return $this->hasMany('App\Models\OrderItem');
    }

    public function deleteOrderItems() {
        foreach ($this->orderItems()->get(['id']) as $order_item) {
            $order_item->delete();
        }
    }
}