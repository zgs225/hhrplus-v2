<?php

namespace App\Models\Order\Traits;


trait OrderItemTrait
{
  public function getDetailAttribute() {
    $detail = '<p><small>%s</small><br><small>%s</small></p>';

    return sprintf($detail, $this->product_name, "数量: $this->quantity");
  }
}