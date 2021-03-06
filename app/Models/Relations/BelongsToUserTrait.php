<?php

namespace App\Models\Relations;

trait BelongsToUserTrait
{
    public function user() {
        return $this->belongsTo('App\Models\Access\User\User');
    }
}