<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //use HasFactory;
  public function category()
    {
    //hasMany iliskisinin tersini cagiran iliski tanimi
    return $this->belongsTo(Expenditure::class,'category_id','id');
    }

}
