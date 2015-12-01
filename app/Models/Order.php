<?php

namespace App\Models;

use App\Models\Order\Traits\OrderAttributes;
use App\Models\Relations\BelongsToUserTrait;
use App\Models\Relations\HasManyOrderItemsTrait;
use App\Models\Relations\HasManyOrderStatusesTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
  use HasManyOrderItemsTrait,
    HasManyOrderStatusesTrait,
    BelongsToUserTrait,
    SoftDeletes,
    OrderAttributes;

  protected $dates = ['deleted_at', 'paid_at'];

  protected $guarded = ['id'];

  protected $fillable = [
    'user_id', 'order_no', 'buyer_name',
    'buyer_ip', 'buyer_email', 'buyer_telephone', 'paid_at'
  ];
}
