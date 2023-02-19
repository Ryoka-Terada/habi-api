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

  /**
   * GET時のパラメータ例
   */
  public function getApiParameters()
  {
    return [
      'is_pay' => [
        'description' => '収支フラグ',
        'example' => 1
      ],
      'parent_id' => [
        'description' => '親カテゴリID',
        'example' => 1
      ],
    ];
  }

  /**
   * POST時のパラメータ例
   */
  public function postApiParameters()
  {
    return [
      'category_name' => [
        'description' => '子カテゴリ名',
        'example' => 'ランチ代'
      ],
      'parent_id' => [
        'description' => '親カテゴリID',
        'example' => 1
      ],
    ];
  }
}
