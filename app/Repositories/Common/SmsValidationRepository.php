<?php

namespace App\Repositories\Common;

use Session;

/**
 * 和短信验证码相关的帮助方法
 **/
class SmsValidationRepository
{
  const VALI_CODE_KEY = 'sms.key';

  /**
   * Generate a validation code 
   * and set the code into session.
   *
   * @return string of validation code
   **/
  public static function generateAndRegistry()
  {
    $valiCode = self::randDigits();
    self::registry($valiCode);
    return $valiCode;
  }

  public static function makeValidationSms()
  {
    $smsCode = self::generateAndRegistry();
    return sprintf("验证码：%s 【合伙人+】", $smsCode);
  }

  /**
   * Set validation code into session
   **/
  public static function registry($code)
  {
    Session::put(self::VALI_CODE_KEY, $code);
  }

  /**
   * Clear validation code from sessoin
   **/
  public static function destroy()
  {
    Session::forget(self::VALI_CODE_KEY);
  }

  /**
   * Authenticate supply validation code equals to code in SESSION. 
   *
   * @return whether authenticate
   **/
  public static function auth($code)
  {
    $result = Session::has(self::VALI_CODE_KEY) &&
      Session::get(self::VALI_CODE_KEY) == $code;

    if ($result) {
      self::destroy();
    }

    return $result;
  }

  /**
   * Opposite of auth()
   *
   * @return whether not authenticate
   **/
  public static function fails($code)
  {
    return !self::auth($code);
  }

  protected static function randDigits($length = 6) {
    $digits = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $result = '';
    for ($i = 0; $i < 6; $i++)
      $result .= array_rand($digits);
    return $result;
  }
} // END class SmsValidationRepository
