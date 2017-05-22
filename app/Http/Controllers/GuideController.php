<?php

namespace App\Http\Controllers;

use App\Guide;
use DB;
use Illuminate\Http\Request;

class GuideController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Http\Response
   */
  public function index()
  {
    return DB::table('guides')
        ->select('id', 'title', 'url')
        ->paginate(25);
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
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Guide $guide
   * @return \Illuminate\Http\Response
   */
  public function show(Guide $guide)
  {
    return Guide::find($guide->id);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Guide $guide
   * @return \Illuminate\Http\Response
   */
  public function edit(Guide $guide)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \App\Guide $guide
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Guide $guide)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Guide $guide
   * @return \Illuminate\Http\Response
   */
  public function destroy(Guide $guide)
  {
    //
  }
}
