<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BaseRequest extends FormRequest
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
   * APIリクエストによって適用するルールを変える
   *
   * @return array
   */
  public function rules()
  {
    switch (request()->method()) {
      case 'GET':
        return $this->getRules();

        break;

      case 'POST':
        return $this->postRules();

        break;

      case 'PUT':
        return $this->putRules();

        break;
    }
  }

  /**
   * バリデーションに失敗した場合、Json形式でエラーメッセージを返す
   */
  protected function failedValidation(Validator $validator)
  {
    $res = response()->json(
      [
        'errors' => $validator->errors(),
      ],
      400
    );

    throw new HttpResponseException($res);
  }
}
