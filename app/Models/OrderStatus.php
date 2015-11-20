<?php

namespace App\Models;

use App\Models\Relations\BelongsToOrderTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatus extends Model
{
    // 未付款状态码
    const STATUS_CODE_UN_PAY = 0;
    const STATUS_UN_PAY = '未付款';
    // 已付款状态码
    const STATUS_CODE_PAYMENT_SUCCESS = 1;
    const STATUS_PAYMENT_SUCCESS = '已付款';

    use BelongsToOrderTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    protected $casts = [
        'is_current' => 'boolean'
    ];
}
