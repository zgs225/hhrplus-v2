<?php

namespace App\Models\Relations;

trait HasManyGoodItemsTrait
{
    public function goodItems() {
        return $this->hasMany('App\Models\GoodItem');
    }

    public function deleteGoodItems() {
        foreach ($this->goodItems()->get(['id']) as $good_item) {
            $good_item->delete();
        }
    }
}