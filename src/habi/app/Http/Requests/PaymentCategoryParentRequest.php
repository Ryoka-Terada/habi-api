<?php

namespace App\Http\Requests;

/**
 * 親カテゴリ_リクエストクラス
 */
class PaymentCategoryParentRequest extends BaseRequest
{
  /**
   * GET時のバリデーションルール
   *
   * @return array
   */
  public function getRules()
  {
    return [
      'is_pay' => ['integer']
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
      'is_pay' => ['required', 'integer'],
      'category_name' => ['required'],
      'user_id' => ['required'],
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
      ]
    ];
  }

  /**
   * POST時のパラメータ例
   */
  public function postApiParameters()
  {
    return [
      'is_pay' => [
        'description' => '収支フラグ',
        'example' => 1
      ],
      'category_name' => [
        'description' => '親カテゴリ名',
        'example' => '食費'
      ],
      'user_id' => [
        'description' => 'ユーザID',
        'example' => 1
      ],
    ];
  }
}
