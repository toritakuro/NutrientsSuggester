<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Favorite extends Model
{
  protected $table = 'favorites';

  public function insert(){
      $favorite = new Favorite();

      $favorite->user_id = user('id');
      foreach($favorites as $favorite => $value){
          $favorite->name = $value[0];
          $favorite->protein = $value[1];
          $favorite->fat = $value[2];
          $favorite->carbo = $value[3];
          $favorite->kcal = $value[4];
          $favorite->type = $value[5];
      }
          $favorite->save();
  }
  public function favorite(){

      $favorite = Favorite::get();
      return $favorite;
  }
}
