<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Expenditure;

class HomeController extends Controller
      {
         public function __construct()
         {
           $this->middleware('auth');
         }

         public function index()
      {
            $categories=Category::all();
            $expenditures=Expenditure::with('Category');

            $maxExpenditure=DB::table('expenditures')
                            ->orderBy('total','desc')
                            ->first();

                    //  return "En çok harcama " .$maxExpenditure->total ;
                      //return view('create')->with(compact('categories','maxExpenditure'));

             $minExpenditure=DB::table('expenditures')
                              ->orderBy('total','asc')
                              ->first();

                      //return "En az harcama " .$minExpenditure->total;
              //kategoriyle
              $lastExpenditure=Expenditure::with('category')
                              ->orderBy('date','desc')
                              ->first();

              return view('home')->with(compact('categories','expenditures','maxExpenditure','minExpenditure','lastExpenditure'));



      }
    }

?>
