<?php namespace App\Http\Controllers\Frontend;

use App\Models\PackageGood;
use App\Http\Controllers\Controller;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller {

	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
        $packageGoods = PackageGood::all();
		return view('frontend.index', compact('packageGoods'));
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function macros()
	{
		return view('frontend.macros');
	}
}