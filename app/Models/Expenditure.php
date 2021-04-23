<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;
    public function category()
  {
    //comments->comment::class
  //return $this->belongsTo(ilgili modelin::sinif adi,'foreign_key','local_key');
  return $this->belongsTo(Category::class,'category_id','id');
      }


}
