<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
  public function index(PaymentRequest $request)
  {
    $query = DB::table('payment')->select([
      'payment_id',
      'payment_category_parent_id',
      'payment_category_child_id',
      'payment_date',
      'amount',
      'is_pay'
    ])->when($request->has('is_pay'), function ($query) use ($request) {
      $query->where('is_pay', '=', $request->is_pay);
    });

    return $query->get();
  }
}
