<?php

get('/captcha/check', 'CaptchaController@check');

get('/captcha/needsSmsValidation', 'SmsController@needsSmsValidation');
