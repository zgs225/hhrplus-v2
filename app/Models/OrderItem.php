<?php

namespace App\Models;

use App\Models\Order\Traits\OrderItemTrait;
use App\Models\Relations\BelongsToPackageGoodTrait;
use App\Models\Relations\BelongsToOrderTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use BelongsToPackageGoodTrait, BelongsToOrderTrait, SoftDeletes, OrderItemTrait;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];
}
