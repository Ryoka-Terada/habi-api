<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
  use HasFactory;

  /**
   * モデルに関連付けるテーブル
   *
   * @var string
   */
  protected $table = 'payment';

  /**
   * テーブルに関連付ける主キー
   *
   * @var string
   */
  protected $primaryKey = 'payment_id';
}
