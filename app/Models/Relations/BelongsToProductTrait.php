<?php

namespace App\Models\Relations;


trait BelongsToProductTrait
{
    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
}