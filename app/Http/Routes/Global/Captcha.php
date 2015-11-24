<?php

get('/captcha/check', 'CaptchaController@check');
get('/smscode/send', function() {
  return response()->json(['status' => true]);
});
