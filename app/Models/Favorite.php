<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Favorite extends Model
{
  protected $table = 'favorites';


  public function favorite(){

      $favorite = Favorite::get();
      return $favorite;
  }
}
