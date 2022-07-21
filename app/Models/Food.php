<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
      protected $table = 'foods';

      public function food(){
      // foodsテーブルのデータを全て取得し、配列として$foodsに格納
      $foods = Food::get();
      return $foods;
      // フォームから送信された値に一致するまで繰り返しproteinの値を取り出し、足していく
    }

}
