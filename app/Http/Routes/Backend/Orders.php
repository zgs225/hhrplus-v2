<?php

$router->group([
  'namespace' => 'Order',
  'middleware' => 'access.routeNeedsPermission:view-orders-management'
], function() use ($router) {
  resource('orders', 'OrderController');
});
