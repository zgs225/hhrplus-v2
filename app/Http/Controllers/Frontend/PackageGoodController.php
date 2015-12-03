<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\PackageGood;

class PackageGoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $talks = PackageGood::with('goodItems')->whereIn('id', [1, 2])->get();
      $makes = PackageGood::with('goodItems')->whereIn('id', [3, 4, 5, 6])->get();
      $devs  = PackageGood::with('goodItems')->whereIn('id', [7, 8, 9])->get();

      return view('frontend.goods.index', compact('talks', 'makes', 'devs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $packageGood = PackageGood::findOrFail($id);

        return view('frontend.goods.show', compact('packageGood'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function buy($id)
    {
      $packageGood = PackageGood::with('goodItems')->findOrFail($id);

      return view('frontend.goods.buy', compact('packageGood'));
    }
}
