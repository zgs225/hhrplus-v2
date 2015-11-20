<?php

namespace App\Repositories\Frontend\Commerce;

use App\Http\Requests\Frontend\OrderRequest;
use App\Models\Order;

interface OrderContract
{
    public function create(OrderRequest $request);

    public function generateOrderNo($prefix = '');

    public function paymentSuccess(Order $order);

    public function updateOrderStatus(Order $order, $statusCode);
}