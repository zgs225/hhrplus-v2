<?php

namespace App\Models;

use App\Models\Relations\BelongsToUserTrait;
use App\Models\Relations\HasManyOrderItemsTrait;
use App\Models\Relations\HasManyOrderStatusesTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasManyOrderItemsTrait, HasManyOrderStatusesTrait, BelongsToUserTrait, SoftDeletes;

    protected $dates = ['deleted_at', 'paid_at'];

    protected $guarded = ['id'];
}
