<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Expenditure;


class HomeController extends Controller
  {
  //    public function __construct(){
    //   $this->middleware('auth');
  //}

     public function index()
     {
          $categories=Category::all();
          $expenditures=Expenditure::with('Category');

          return view('create')->with(compact('categories', 'expenditures'));
  }
}
?>
