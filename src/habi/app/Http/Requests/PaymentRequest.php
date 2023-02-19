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
      // '*.user_id' => ['required'],
      '*.user_id' => [],
      '*.parent_id' => [],
      '*.child_id' => [],
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
      'date_from' => [
        'description' => '取得期間_開始日',
        'example' => '2023-02-01'
      ],
      'date_to' => [
        'description' => '取得期間_終了日',
        'example' => '2023-02-28'
      ],
    ];
  }

  /**
   * POST時のパラメータ例
   */
  public function postApiParameters()
  {
    return [
      '*.payment_date' => [
        'description' => '収支登録日',
        'example' => '2023-02-20'
      ],
      '*.amount' => [
        'description' => '合計金額',
        'example' => 1200
      ],
      '*.is_pay' => [
        'description' => '収支フラグ',
        'example' => 1
      ],
      '*.user_id' => [
        'description' => 'ユーザID',
        'example' => 1
      ],
      '*.parent_id' => [
        'description' => '親カテゴリID',
        'example' => '1'
      ],
      '*.child_id' => [
        'description' => '子カテゴリID',
        'example' => '1'
      ]
    ];
  }
}
