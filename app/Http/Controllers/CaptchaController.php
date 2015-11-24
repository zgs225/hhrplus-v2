<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CaptchaController extends Controller
{
  public function check(Request $request)
  {
    return response()->json(['isValid' => captcha_check($request->get('captcha'))]);
  }
}
