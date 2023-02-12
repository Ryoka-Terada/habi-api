<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentCategoryParentRequest;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class ParentCategoryController extends Controller
{
  /**
   * 親カテゴリ一覧を取得
   *
   * @param  PaymentCategoryParentRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function index(PaymentCategoryParentRequest $request)
  {
    $query = DB::table('parent_category')
      ->when($request->has('is_pay'), function ($query) use ($request) {
        $query->where('is_pay', '=', $request->is_pay);
      })
      ->where('is_delete', '=', 0);
    $data = $query->get();

    return $data;
  }

  /**
   * 親カテゴリを登録
   *
   * @param  PaymentCategoryParentRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PaymentCategoryParentRequest $request)
  {
    try {
      DB::beginTransaction();

      $newId = (string) Str::uuid();
      DB::table('parent_category')->insert([
        'parent_id' => $newId,
        'category_name' => $request->category_name,
        'is_pay' => $request->is_pay,
        'user_id' => $request->user_id,
        'is_delete' => 0,
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
      ]);
      DB::commit();

      return response(['parent_id' => $newId], 200);
    } catch(Throwable $e) {
      DB::rollBack();

      return response(['error' => 'システムエラーが発生しました。'], 500);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
        //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
        //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
        //
  }
}
