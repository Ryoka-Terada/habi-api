# habi-api
家計簿アプリのバックエンドのリポジトリです。

## 言語とフレームワーク
- PHP 8.0.2
- Laravel Framework 8.83.23

## 共通処理

<h2>src/habi/app/Http/Middleware/CaseConverter.php</h2>
https://github.com/Ryoka-Terada/habi-api/blob/master/src/habi/app/Http/Middleware/CaseConverter.php<br />
<p>
全てのリスエストとレスポンスに適用。	
リクエストに渡ってきたパラメータをキャメル型からスネーク型に変換する。	
レスポンスで返す値をスネーク型からキャメル型に変換する。	
</p>
		
<h2>src/habi/app/Http/Requests/BaseRequest.php</h2>
https://github.com/Ryoka-Terada/habi-api/blob/master/src/habi/app/Http/Requests/BaseRequest.php<br />
<div>
	<h3>BaseRequest::rules</h3>
	<p>
    全てのリクエストに適用。
		メソッドの種類(GET, POST, PUT)に応じて、リクエストクラスで適用するバリデーションルールを変更する。
  </p>
	<h3>BaseRequest::failedValidation</h3>
  <p>
		src/busma/vendor/laravel/framework/src/Illuminate/Foundation/Http/FormRequest.php
		のメソッドをオーバーライド。バリデーション失敗時に決まった形のレスポンスを返す。
  </p>
</div>


## API一覧

|  API名  |  エンドポイント  | メソッド | 説明 |
| ---- | ---- | ---- | ---- |
|  収支登録API  |  api/payment  |  POST  |  収支リストを１日単位で登録する。洗替で登録。  |
|  収支取得API  |  api/payment  |  GET  |  収支リストをパラメータで指定された日付の範囲で取得する。  |
|  親カテゴリ登録API  |  api/parent  |  POST  |  親カテゴリを登録する。  |
|  親カテゴリ更新API  |  api/parent  |  PUT  |  親カテゴリを更新する。  |
|  親カテゴリ削除API  |  api/parent  |  DELETE  |  親カテゴリを削除する。  |
|  親カテゴリ取得API  |  api/parent  |  GET  |  親カテゴリ一覧を取得する。  |
|  子カテゴリ登録API  |  api/child  |  POST  |  子カテゴリを登録する。  |
|  子カテゴリ更新API  |  api/child  |  PUT  |  子カテゴリを更新する。  |
|  子カテゴリ削除API  |  api/child  |  DELETE  |  子カテゴリを削除する。  |
|  子カテゴリ取得API  |  api/child  |  GET  |  パラメータで渡された親カテゴリに属する子カテゴリ一覧を取得する。  |

## API詳細設計

Scribe(https://scribe.knuckles.wtf/)で作成。<br />
このリポジトリをローカルに落とした後、以下ファイルをブラウザで開くと確認可能。<br />
https://github.com/Ryoka-Terada/habi-api/blob/master/src/habi/public/docs/index.html<br />
※Dockerまで環境構築をした後は以下URLで確認できる。<br />
http://localhost:8080/docs/

