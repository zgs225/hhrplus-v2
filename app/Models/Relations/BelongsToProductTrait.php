<?php

namespace app\Models\Relations;


trait BelongsToProductTrait
{
    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
}