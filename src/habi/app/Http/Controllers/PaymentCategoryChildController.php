<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentCategoryChildRequest;
use Illuminate\Support\Facades\DB;

/**
 * 収支カテゴリマスタ（子カテゴリ）
 */
class PaymentCategoryChildController extends Controller
{
  public function index(PaymentCategoryChildRequest $request)
  {
    $query = DB::table('category_child')
      ->join('category_parent', 'category_child.parent_id', '=', 'category_parent.parent_id')
      ->select('category_child.*', 'category_parent.is_pay')
      ->when($request->has('is_pay'), function ($query) use ($request) {
        $query->where('is_pay', '=', $request->is_pay);
      })
      ->where('category_child.is_delete', '=', 0)
      ->when($request->has('parent_id'), function ($query) use ($request) {
        $query->where('category_child.parent_id', '=', $request->parent_id);
      });
    $data = $query->get();

    return $data;
  }
}
