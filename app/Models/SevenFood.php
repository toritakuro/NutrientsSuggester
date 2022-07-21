<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SevenFood extends Model
{
  protected $table = 'seven_foods';

  public function sevenfood(){
  // foodsテーブルのデータを全て取得し、配列として$foodsに格納
  $sevenfoods = SevenFood::get();
  return $sevenfoods;
}
}
