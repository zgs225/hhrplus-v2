<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Common\SmsGatewayContract;
use App\Repositories\Common\SmsValidationRepository;

class SmsController extends Controller
{
  /**
   * Sms gateway instance
   *
   * @var mixed
   **/
  protected $gateway;

  public function __construct(SmsGatewayContract $gateway)
  {
    $this->gateway = $gateway;
  }

  /**
   * 发送短信验证码
   **/
  public function needsSmsValidation(Request $request)
  {
    $sms = SmsValidationRepository::makeValidationSms();
    $tel = $request->get('telephone');
    $res = $this->gateway->send($tel, $sms);

    if ($res->error == 0) {
      return response()->json(['status' => 'success', 'statusCode' => 1]);
    } else {
      return response()->json(['status' => '发送失败，请重试', 'statusCode' => 0]);
    }
  }
}
