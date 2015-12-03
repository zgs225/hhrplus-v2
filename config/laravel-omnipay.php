<?php

return [

  // The default gateway to use
  'default' => 'alipay',

  // Add in each gateway here
  'gateways' => [
    'paypal' => [
      'driver'  => 'PayPal_Express',
      'options' => [
        'solutionType'   => '',
        'landingPage'    => '',
        'headerImageUrl' => ''
      ]
    ],

    'alipay' => [
      'driver' => 'Alipay_Express',
      'options' => [
        'partner'     => env('ALIPAY_PARTNER_ID'),
        'key'         => env('ALIPAY_KEY'),
        'sellerEmail' => env('ALIPAY_SELLER_EMAIL'),
        'notifyUrl'   => env('ALIPAY_NOTIFY_URL'),
        'returnUrl'   => env('ALIPAY_RETURN_URL')
      ]
    ],

    'alipay_wap' => [
      'driver' => 'Alipay_WapExpress',
      'options' => [
        'partner'     => env('ALIPAY_PARTNER_ID'),
        'key'         => env('ALIPAY_KEY'),
        'sellerEmail' => env('ALIPAY_SELLER_EMAIL'),
        'notifyUrl'   => env('ALIPAY_NOTIFY_URL'),
        'returnUrl'   => env('ALIPAY_RETURN_URL'),
        'privateKey'  => storage_path() . '/key/rsa_private_key.pem'
      ]
    ]
  ]

];
