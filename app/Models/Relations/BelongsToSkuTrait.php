<?php

namespace App\Models\Relations;


trait BelongsToSkuTrait
{
    public function sku() {
        return $this->belongsTo('App\Models\Sku');
    }
}