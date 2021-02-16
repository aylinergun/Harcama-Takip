<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
  //  use HasFactory;
    public function expenditure()
  {
  //return $this->hasMany(ilgili modelin sinif adi,'foreign_key','local_key');
  return $this->hasMany(Category::class,'category_id','id');
  }
}
