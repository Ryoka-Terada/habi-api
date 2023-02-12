<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
  /**
   * 収支一覧を取得
   *
   * @return \Illuminate\Http\Response
   */
  public function index(PaymentRequest $request)
  {
    $query = DB::table('payment')->select([
      'payment.payment_id',
      'payment.parent_id',
      'parent_category.category_name',
      'payment.child_id',
      'payment.payment_date',
      'payment.amount',
      'payment.is_pay'
    ])->when($request->has('is_pay'), function ($query) use ($request) {
      $query->where('payment.is_pay', '=', $request->is_pay);
    })->when($request->has('date_from') && $request->has('date_to'), function ($query) use ($request) {
      $query->whereBetween('payment.payment_date', [$request->date_from, $request->date_to]);
    })->leftJoin('parent_category', 'parent_category.parent_id', '=', 'payment.parent_id');

    return $query->get();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PaymentRequest $request)
  {
    return "hello";
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
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
}
