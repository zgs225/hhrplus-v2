<?php

namespace App\Repositories\Common;

interface SmsGatewayContract
{
  public function send($mobile, $content);
}
