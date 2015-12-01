<?php

/**
 * Global helpers file with misc functions
 **/

if (!function_exists('app_name')) {
  /**
   * Helper to grab the application name
   *
   * @return mixed
   */
  function app_name()
  {
    return config('app.name');
  }
}

if (!function_exists('access')) {
  /**
   * Access (lol) the Access:: facade as a simple function
   */
  function access()
  {
    return app('access');
  }
}

if (!function_exists('javascript')) {
  /**
   * Access the javascript helper
   */
  function javascript()
  {
    return app('JavaScript');
  }
}

if (!function_exists('gravatar')) {
  /**
   * Access the gravatar helper
   */
  function gravatar()
  {
    return app('gravatar');
  }
}

if (!function_exists('sms_validation_check')) {
  function sms_validation_check($code)
  {
    return \App\Repositories\Common\SmsValidationRepository::auth($code);
  }
}

if (!function_exists('rmb')) {
  function rmb($money)
  {
    return sprintf("￥%s", money_format("%.2n", $money));
  }
}
