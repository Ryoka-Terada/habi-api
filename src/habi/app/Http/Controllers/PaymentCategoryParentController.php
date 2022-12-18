<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentCategoryParentController extends Controller
{
  public function index($isPay)
  {
    $query = DB::table('payment_category_parent')->where('is_pay', '=', $isPay)->where('is_delete', '=', 0);
    $data = $query->get();

    return $data;
  }
}
