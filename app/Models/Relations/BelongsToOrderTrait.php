<?php

namespace App\Models\Relations;

trait BelongsToOrderTrait
{
    public function order() {
        return $this->belongsTo('App\Models\Order');
    }
}