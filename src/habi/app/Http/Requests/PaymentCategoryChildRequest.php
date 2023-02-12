<?php

namespace App\Http\Requests;

/**
 * 子カテゴリ_リクエストクラス
 */
class PaymentCategoryChildRequest extends BaseRequest
{
  /**
   * GET時のバリデーションルール
   *
   * @return array
   */
  public function getRules()
  {
    return [
      'is_pay' => ['integer'],
      'parent_id' => [],
    ];
  }

  /**
   * POST時のバリデーションルール
   *
   * @return array
   */
  public function postRules()
  {
    return [
      'category_name' => ['required'],
      'parent_id' => ['required'],
    ];
  }
}
