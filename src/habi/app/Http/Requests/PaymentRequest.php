<?php

namespace App\Http\Requests;

/**
 * 収支_リクエストクラス
 */
class PaymentRequest extends BaseRequest
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
      'date_from' => ['date', 'required_with:date_to'],
      'date_to' => ['date', 'required_with:date_from'],
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
      '*.payment_date' => ['required', 'date'],
      '*.amount' => ['required', 'integer'],
      '*.is_pay' => ['required'],
      '*.user_id' => ['required'],
      '*.parent_id' => [],
      '*.child_id' => [],
    ];
  }
}
