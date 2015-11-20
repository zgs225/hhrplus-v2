<?php

namespace App\Models;

use App\Models\Relations\BelongsToProductTrait;
use App\Models\Relations\HasManyGoodItemsTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sku extends Model
{
    use BelongsToProductTrait, HasManyGoodItemsTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];
}
