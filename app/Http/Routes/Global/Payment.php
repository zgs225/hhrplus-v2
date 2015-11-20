<?php

get('payment/gateway', 'PaymentController@gateway')->name('payment.gateway');
get('payment/return', 'PaymentController@webReturn');
post('payment/notify', 'PaymentController@webNotify');
