<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Expenditure;
use Carbon\Carbon;

class HomeController extends Controller
      {
         public function __construct()
         {
           $this->middleware('auth');
         }

         public function index()
      {
            $categories=Category::all();
            $expenditures=Expenditure::with('Category')
                        ->orderBy('date');




            $maxExpenditure=Expenditure::select(\DB::raw('MONTHNAME(date) month'))
                            ->orderBy('total','DESC')
                            ->first();

             $minExpenditure=Expenditure::select(\DB::raw('MONTHNAME(date) month'))                  
                            ->orderBy('total','ASC')
                            ->first();
             //Expenditure::select(\DB::raw('MONTH(date) AS month'))

              $lastExpenditure=Expenditure::with('category')
                             ->orderBy('date','DESC')
                             ->first();

              return view('home')->with(compact('categories','expenditures','maxExpenditure','minExpenditure','lastExpenditure'));



      }
    }

?>
