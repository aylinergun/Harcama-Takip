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

            $maxExpenditure=Expenditure::select(\DB::raw('MONTH(date) month'),\DB::raw('SUM(total)  total'))
                            ->groupBy('month','total')
                            ->orderBy('total','DESC')
                            ->first();

            $minExpenditure=Expenditure::select(\DB::raw('MONTH(date) month'),\DB::raw('SUM(total)  total'))
                            ->groupBy('month','total')
                            ->orderBy('total','ASC')
                            ->first();


            $lastExpenditure=Expenditure::orderBy('created_at','DESC')
                            ->first();


            $annualExpenditures=Expenditure::select(\DB::raw('YEAR(date) year'),\DB::raw('SUM(total) total'))
                            ->groupBy('year')
                            ->get();

            $monthlyExpenditures=Expenditure::select(\DB::raw('YEAR(date) year'),\DB::raw('MONTHNAME(date) month'),\DB::raw('SUM(total) total'),\DB::raw('COUNT(*) as number_of_expenditures'))
                            ->groupBy('year','month')
                            ->get();

            $expenditureLocations=Expenditure::select(\DB::raw('YEAR(date) year'),\DB::raw('COUNT(*) as number_of_expenditures'),\DB::raw('location'))
                            ->groupBy('year','location')
                            ->get();

            $actualExpenditures=Expenditure::whereMonth('date', Carbon::now()->month)
                            ->whereYear('date', Carbon::now()->year)
                            ->get();

            $categoryExpenditures=Expenditure::select(\DB::raw('location'),\DB::raw('category_id'))
                            ->groupBy('category_id','location')
                            ->get();

            $allExpenditures=Expenditure::paginate(5);


           return view('home')->with(compact('categories','expenditures','maxExpenditure','minExpenditure','lastExpenditure','annualExpenditures','monthlyExpenditures','expenditureLocations','actualExpenditures','categoryExpenditures','allExpenditures'));

      }

    }
