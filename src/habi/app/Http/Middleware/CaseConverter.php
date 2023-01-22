<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CaseConverter
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next)
  {
    // フォームから来たキャメルケースをスネークケースに戻すのはこれっぽい
    // そもそもスネークケースに戻す必要あるか？
    $form_input = $request->input();
    $request->replace($this->_recursiveConvert((array) $form_input, 'snake'));

    $response = $next($request);
    $response_content = json_decode($response->getContent(), true);
    $converted_response_content_json = json_encode($this->_recursiveConvert($response_content, 'camel'));
    $response->setContent($converted_response_content_json);

    return $response;
  }

  private function _recursiveConvert(array $items, string $method)
  {
    $new_items = [];

    foreach ($items as $key => $value) {
      $new_key = Str::{$method}($key);

      if (!is_array($value)) {
        $new_items[$new_key] = $value;
      } else {
        $new_items[$new_key] = $this->_recursiveConvert($value, $method);
      }
    }

    return $new_items;
  }
// https://shiro-secret-base.com/?p=1048
// から持ってきました
}
