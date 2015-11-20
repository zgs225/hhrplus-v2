<?php

namespace app\Models\Relations;


trait BelongsToSkuTrait
{
    public function sku() {
        return $this->belongsTo('App\Models\Sku');
    }
}