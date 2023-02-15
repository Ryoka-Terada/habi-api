<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\PaymentRequest;
use App\Models\PaymentModel;
use DateTime;
use Illuminate\Support\Str;
use Throwable;

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
   * 収支を登録(配列で渡されたものを洗い替えで登録)
   *
   * @param  PaymentRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(PaymentRequest $request)
  {
    $insertDatas = $request->toArray();

    try {
      DB::beginTransaction();
      // 対象の日付の収支を全て削除
      PaymentModel::where('payment_date', '=', $insertDatas[0]['payment_date'])->forceDelete();
      // リクエストで渡された収支情報を全て登録
      foreach ($insertDatas as $data) {
        $newId = (string) Str::uuid();
        DB::table('payment')->insert([
          'payment_id' => $newId,
          'payment_date' => $data['payment_date'],
          'amount' => $data['amount'],
          'is_pay' => $data['is_pay'],
          'parent_id' => $data['parent_id'] ?? null,
          'child_id' => $data['child_id'] ?? null,
          // 'user_id' => $data['user_id'],
          'user_id' => 1,
          'created_at' => new DateTime(),
          'updated_at' => new DateTime(),
        ]);
      }
      DB::commit();

      return response(['insertCount' => count($insertDatas)], 200);
    } catch(Throwable $e) {
      DB::rollBack();

      return response(['error' => 'システムエラーが発生しました。'], 500);
    }
  }
}
