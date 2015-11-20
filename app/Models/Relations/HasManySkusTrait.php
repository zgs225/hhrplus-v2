<?php

namespace App\Models\Relations;


trait HasManySkusTrait
{
    public function skus() {
        return $this->hasMany('App\Models\Sku');
    }

    public function deleteSkus() {
        foreach ($this->skus()->get(['id']) as $sku) {
            $sku->delete();
        }

    }
}