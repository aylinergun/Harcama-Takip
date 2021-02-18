<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Expenditure;


class HomeController extends Controller
  {
    public function __construct(){
      $this->middleware('auth');
  }

     public function index(){
          $expenditures=Expenditure::all();
          return view('create',compact('expenditures'));
      }
}
