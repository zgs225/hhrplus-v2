<?php

namespace app\Models\Relations;


trait BelongsToPackageGoodTrait
{
    public function packageGood() {
        return $this->belongsTo('App\Models\PackageGood');
    }
}