<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentCategoryChildRequest;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class ChildCategoryController extends Controller
{
  /**
   * 子カテゴリ一覧を取得
   *
   * @param  PaymentCategoryChildRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function index(PaymentCategoryChildRequest $request)
  {
    $query = DB::table('child_category')
      ->join('parent_category', 'child_category.parent_id', '=', 'parent_category.parent_id')
      ->select('child_category.*', 'parent_category.is_pay')
      ->when($request->has('is_pay'), function ($query) use ($request) {
        $query->where('is_pay', '=', $request->is_pay);
      })
      ->where('child_category.is_delete', '=', 0)
      ->when($request->has('parent_id'), function ($query) use ($request) {
        $query->where('child_category.parent_id', '=', $request->parent_id);
      });
    $data = $query->get();

    return $data;
  }

  /**
   * 子カテゴリを登録
   *
   * @param  PaymentCategoryChildRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PaymentCategoryChildRequest $request)
  {
    try {
      DB::beginTransaction();

      $newId = (string) Str::uuid();
      DB::table('child_category')->insert([
        'child_id' => $newId,
        'category_name' => $request->category_name,
        'parent_id' => $request->parent_id,
        'is_delete' => 0,
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
      ]);
      DB::commit();

      return response(['child_id' => $newId], 200);
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
