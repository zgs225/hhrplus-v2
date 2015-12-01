<?php

namespace App\Models\Order\Traits;


trait OrderAttributes
{
  public function getDetailAttribute() {
    $detailLink = route('admin.orders.show', $this->id);

    $detail = '<div class="order-detail"><p><a href="%s"><strong>%s</strong></a></p>%s</div>';

    return sprintf($detail, $detailLink, $this->order_no, $this->itemsDetail);
  }

  public function getItemsDetailAttribute() {
    $detail = '';

    foreach ($this->orderItems as $item) {
      $detail .= $item->detail;
    }

    return $detail;

  }

  public function getBuyerDetailAttribute() {
    $detail = '<div class="buyer-detail"><p><small>姓名: %s</small><br><small>手机: %s</small><br><small>邮箱: %s</small></p></div>';

    return sprintf($detail, $this->buyer_name, $this->buyer_telephone, $this->buyer_email);
  }

  public function getCurrentStatusAttribute() {
    return $this->orderStatuses()->whereIsCurrent(true)->first();
  }

  /**
   * @return string
   */
  public function getActionButtonsAttribute() {
    return $this->getEditButtonAttribute().
    $this->getDeleteButtonAttribute();
  }

  public function getEditButtonAttribute() {
    if (access()->can('edit-orders'))
      return '<a href="'.route('admin.orders.edit', $this->id).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('crud.edit_button') . '"></i></a> ';
    return '';
  }

  public function getDeleteButtonAttribute() {
    if (access()->can('delete-orders'))
      return '<a href="'.route('admin.orders.destroy', $this->id).'" data-method="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('crud.delete_button') . '"></i></a>';
    return '';
  }
}