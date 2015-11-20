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
                'partner'     => '2088801188200796',
                'key'         => 'fbxziz2h95h4jx7xzg04ora8j2beeg8u',
                'sellerEmail' => '68855871@qq.com ',
                'notifyUrl'   => 'http://www.hhrplus.com/payment/notify',
                'returnUrl'   => 'http://localhost:8000/payment/return'
            ]
        ]
	]

];