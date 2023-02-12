<?php

namespace App\Http\Requests;

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
}
