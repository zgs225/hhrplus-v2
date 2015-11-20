<?php

namespace App\Models;

use App\Models\Relations\BelongsToOrderTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatus extends Model
{
    use BelongsToOrderTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    protected $casts = [
        'is_current' => 'boolean'
    ];
}
