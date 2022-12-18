<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentCategoryChildController extends Controller
{
  public function index($isPay, $parentId = null)
  {
    $query = DB::table('payment_category_child')
      ->join('payment_category_parent', 'payment_category_child.payment_category_parent_id', '=', 'payment_category_parent.payment_category_parent_id')
      ->select('payment_category_child.*', 'payment_category_parent.is_pay')
      ->where('is_pay', '=', $isPay)
      ->where('payment_category_child.is_delete', '=', 0);

    if (isset($parentId)) {
      $query->where('payment_category_child.payment_category_parent_id', '=', $parentId);
    }
    $data = $query->get();

    return $data;
  }
}
