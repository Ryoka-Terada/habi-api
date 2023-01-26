<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * 収支管理APIのリクエストバリデーション
   *
   * @return array
   */
  public function rules()
  {
    return [
      'is_pay' => 'integer',
      'date_from' => 'date | required_with:date_to',
      'date_to' => 'date | required_with:date_from',
    ];
  }
}
