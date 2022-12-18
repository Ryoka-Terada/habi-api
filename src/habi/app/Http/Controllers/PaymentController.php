<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
  public function index()
  {
    $query = DB::table('payment')->select([
      'payment_id',
      'payment_category_parent_id',
      'payment_category_child_id',
      'payment_date',
      'amount',
      'is_pay'
    ]);

    return $query->get();
  }
}
