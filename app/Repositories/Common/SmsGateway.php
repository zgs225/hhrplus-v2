<?php

namespace App\Repositories\Common;

/**
 * 用于发送短信验证码
 **/
class SmsGateway
{
  /**
   * request url
   *
   * @var string
   **/
  protected $url;

  /**
   * api authenticate key
   *
   * @var string
   **/
  protected $apiKey;

  /**
   * curl instance
   *
   * @var mixed
   **/
  protected $ch;

  public function __construct($url, $apiKey)
  {
    $this->url    = $url;
    $this->apiKey = $apiKey;
  }

  /**
   * 向单个号码发送短信
   *
   * @var $mobile string
   * @var $content string
   *
   * @return mixed
   **/
  public function send($mobile, $content)
  {
    $this->makeCurl();
    $this->setRecevierAndContent($mobile, $content);
    $res = curl_exec($this->ch);
    $this->close();
    return json_decode($res);
  }

  protected function close()
  {
    if (!is_null($this->ch)) {
      curl_close($this->ch);
    }
  }

  protected function setRecevierAndContent($mobile, $content)
  {
    curl_setopt($this->ch, CURLOPT_POSTFIELDS, array('mobile' => $mobile,'message' => $content));
  }

  protected function makeCurl()
  {
    $this->ch = curl_init();

    curl_setopt($this->ch, CURLOPT_URL, $this->url);
    curl_setopt($this->ch, CURLOPT_HTTP_VERSION  , CURL_HTTP_VERSION_1_0 );
    curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($this->ch, CURLOPT_HEADER, FALSE);
    curl_setopt($this->ch, CURLOPT_HTTPAUTH , CURLAUTH_BASIC);
    curl_setopt($this->ch, CURLOPT_USERPWD  , 'api:key-'. $this->apiKey);
    curl_setopt($this->ch, CURLOPT_POST, TRUE);
  }
} // END class SmsGateway
