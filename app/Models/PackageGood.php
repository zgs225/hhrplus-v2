<?php

namespace App\Models;

use App\Models\Relations\HasManyGoodItemsTrait;
use App\Models\Relations\HasManyOrderItemsTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageGood extends Model
{
    use HasManyGoodItemsTrait, HasManyOrderItemsTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    protected $casts = [
        'is_multiple' => 'boolean'
    ];
}
