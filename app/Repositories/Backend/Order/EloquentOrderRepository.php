<?php

namespace app\Repositories\Backend\Order;


use App\Models\Order;

class EloquentOrderRepository implements OrderContract
{

  /**
   * 分页获取订单
   *
   * @param int $per_page
   * @param string $order_by
   * @param string $sort
   *
   * @return mixed
   **/
  public function getOrdersPaginated($per_page, $order_by = 'created_at', $sort = 'desc')
  {
    return Order::with('orderItems', 'orderStatuses')->orderBy($order_by, $sort)->paginate($per_page);
  }

  /**
   * 获取所有订单
   *
   * @param string $order_by
   * @param string $sort
   *
   * @return mixed
   **/
  public function getAllOrders($order_by = 'created_at', $sort = 'desc')
  {
    return Order::with('orderItems', 'orderStatuses')->orderBy($order_by, $sort)->get();
  }
}