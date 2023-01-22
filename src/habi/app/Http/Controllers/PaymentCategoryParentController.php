<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentCategoryParentRequest;
use Illuminate\Support\Facades\DB;

class PaymentCategoryParentController extends Controller
{
  public function index(PaymentCategoryParentRequest $request)
  {
    $query = DB::table('payment_category_parent')->where('is_pay', '=', $request['is_pay'])->where('is_delete', '=', 0);
    $data = $query->get();

    return $data;
  }
}
