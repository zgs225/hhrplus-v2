<?php

namespace App\Models;

use App\Models\Relations\BelongsToSkuTrait;
use App\Models\Relations\BelongsToPackageGoodTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodItem extends Model
{
    use BelongsToSkuTrait, BelongsToPackageGoodTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];
}
