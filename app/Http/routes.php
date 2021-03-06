<?php

/**
 * Switch between the included languages
 */
require(__DIR__ . "/Routes/Global/Lang.php");

/**
 * 支付相关
 */
require(__DIR__ . "/Routes/Global/Payment.php");

/**
 * 验证码相关
 */
require(__DIR__ . "/Routes/Global/Captcha.php");

/**
 * Frontend Routes
 * Namespaces indicate folder structure
 */
$router->group(['namespace' => 'Frontend'], function () use ($router)
{
  require(__DIR__ . "/Routes/Frontend/Frontend.php");
  require(__DIR__ . "/Routes/Frontend/Access.php");
});

/**
 * Backend Routes
 * Namespaces indicate folder structure
 */
$router->group(['namespace' => 'Backend'], function () use ($router)
{
  $router->group(['prefix' => 'admin', 'middleware' => 'auth'], function () use ($router)
  {
    /**
     * These routes need view-backend permission (good if you want to allow more than one group in the backend, then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    $router->group(['middleware' => 'access.routeNeedsPermission:view-backend'], function () use ($router)
    {
      require(__DIR__ . "/Routes/Backend/Dashboard.php");
      require(__DIR__ . "/Routes/Backend/Access.php");
      require(__DIR__ . "/Routes/Backend/Orders.php");
    });
  });
});
