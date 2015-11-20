<?php

namespace App\Models;

use App\Models\Relations\HasManySkusTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasManySkusTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];
}
