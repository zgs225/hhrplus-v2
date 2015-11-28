<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Repositories\Common\SmsGateway;

class SmsGatewayTest extends TestCase
{
  /**
   * Sms send gateway
   *
   * @var mixed
   **/
  protected $gateway;

  public function __construct()
  {
    parent::__construct();

    $this->gateway = new SmsGateway('http://sms-api.luosimao.com/v1/send.json',
                                    '6c4adc1a30eb4fbda8edf279ae5f76db');
  }

  public function testSend()
  {
    $res = $this->gateway->send('18511679139', '验证码：321123【合伙人+】');

    $this->assertEquals(0, $res->error);
  }
}
