<?php namespace App\Repositories\Backend\Order;

/**
 * Interface OrderContract
 *
 * @package App\Repositories\Backend\Order;
**/
interface OrderContract
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
  public function getOrdersPaginated($per_page, $order_by = 'created_at', $sort = 'desc');

  /**
   * 获取所有订单
   *
   * @param string $order_by
   * @param string $sort
   *
   * @return mixed
   **/
  public function getAllOrders($order_by = 'created_at', $sort = 'desc');
}
