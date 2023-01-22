<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentCategoryChildRequest;
use Illuminate\Support\Facades\DB;

class PaymentCategoryChildController extends Controller
{
  public function index(PaymentCategoryChildRequest $request)
  {
    $query = DB::table('payment_category_child')
      ->join('payment_category_parent', 'payment_category_child.payment_category_parent_id', '=', 'payment_category_parent.payment_category_parent_id')
      ->select('payment_category_child.*', 'payment_category_parent.is_pay')
      ->where('is_pay', '=', $request['is_pay'])
      ->where('payment_category_child.is_delete', '=', 0)
      ->when($request['parent_id'], function ($query) use ($request) {
        $query->where('payment_category_child.payment_category_parent_id', '=', $request['parent_id']);
      });
    $data = $query->get();

    return $data;
  }
}