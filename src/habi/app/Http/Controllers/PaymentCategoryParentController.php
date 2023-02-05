<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentCategoryParentRequest;
use Illuminate\Support\Facades\DB;

/**
 * 収支カテゴリマスタ（親カテゴリ）
 */
class PaymentCategoryParentController extends Controller
{
  public function index(PaymentCategoryParentRequest $request)
  {
    $query = DB::table('category_parent')
      ->when($request->has('is_pay'), function ($query) use ($request) {
        $query->where('is_pay', '=', $request->is_pay);
      })
      ->where('is_delete', '=', 0);
    $data = $query->get();

    return $data;
  }
}
