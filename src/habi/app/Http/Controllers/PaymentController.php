<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PaymentRequest;

/**
 * 収支管理API
 */
class PaymentController extends Controller
{
  public function index(PaymentRequest $request)
  {
    $query = DB::table('payment')->select([
      'payment.payment_id',
      'payment.parent_id',
      'category_parent.category_name',
      'payment.child_id',
      'payment.payment_date',
      'payment.amount',
      'payment.is_pay'
    ])->when($request->has('is_pay'), function ($query) use ($request) {
      $query->where('payment.is_pay', '=', $request->is_pay);
    })->when($request->has('date_from') && $request->has('date_to'), function ($query) use ($request) {
      $query->whereBetween('payment.payment_date', [$request->date_from, $request->date_to]);
    })->leftJoin('category_parent', 'category_parent.parent_id', '=', 'payment.parent_id');

    return $query->get();
  }
}
