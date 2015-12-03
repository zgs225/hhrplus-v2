<?php
namespace App\Models\PackageGood\Traits;

trait PackageGoodAttributes
{
  public function getOriginalPriceAttribute()
  {
    switch ($this->id) {
      case 3:
        return 1980;
        break;
      case 4:
        return 7980;
        break;
      case 5:
        return 26980;
        break;
      case 6:
        return 76980;
        break;
    }
  }
}
