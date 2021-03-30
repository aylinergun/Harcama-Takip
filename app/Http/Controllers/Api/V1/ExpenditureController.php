<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Expenditure;
use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

class ExpenditureController extends Controller
{
      public function mainExpenditure()
      {
           $mainExpenditure=Expenditure::with('Category')
                            ->orderBy('date','desc')
                            ->get();

           return response()->json([
             'data'=>$mainExpenditure,
           ]);
      }

      public function maxExpenditure()
      {
          $maxExpenditure=Expenditure::select(\DB::raw('MONTH(date) month'),\DB::raw('SUM(total) total'))
                        ->groupBy('month','total')
                        ->orderBy('total','DESC')
                        ->first();

          Return response()->json([
            'data'=>$maxExpenditure,
          ]);
      }

      public function minExpenditure()
      {
        $minExpenditure=Expenditure::select(\DB::raw('MONTH(date) month'),\DB::raw('SUM(total) total'))
                      ->groupBy('month','total')
                      ->orderBy('total','ASC')
                      ->first();

          Return response()->json([
            'data'=>$minExpenditure,
          ]);
      }

      public function lastExpenditure()
      {
          $lastExpenditure=Expenditure::orderBy('created_at','DESC')
                          ->first();

          Return response()->json([
            'data'=>$lastExpenditure,
          ]);
      }

      public function annualExpenditures()
      {
          $annualExpenditures=Expenditure::select(\DB::raw('YEAR(date) year'),\DB::raw('SUM(total) total'))
                            ->groupBy('year')
                            ->get();

          Return response()->json([
            'data'=>$annualExpenditures,
          ]);
      }

      public function monthlyExpenditures()
      {
          $monthlyExpenditures=Expenditure::select(\DB::raw('YEAR(date) year'),\DB::raw('MONTHNAME(date) month'),\DB::raw('SUM(total) total'),\DB::raw('COUNT(*) as number_of_expenditures'))
                          ->groupBy('year','month')
                          ->get();

          Return response()->json([
            'data'=>$monthlyExpenditures,
          ]);
      }

      public function expenditureLocations()
      {
          $expenditureLocations=Expenditure::select(\DB::raw('YEAR(date) year'),\DB::raw('COUNT(*) as number_of_expenditures'),\DB::raw('location'))
                          ->groupBy('year','location')
                          ->get();

          Return response()->json([
            'data'=>$expenditureLocations,
          ]);
      }

      public function actualExpenditures()
      {
          $actualExpenditures=Expenditure::whereMonth('date', Carbon::now()->month)
                          ->whereYear('date', Carbon::now()->year)
                          ->get();

          Return response()->json([
            'data'=>$actualExpenditures,
          ]);
      }

      public function categoryExpenditures()
      {
         $categoryExpenditures=Expenditure::select(\DB::raw('location'),\DB::raw('category_id'))
                            ->groupBy('category_id','location')
                            ->get();

         Return response()->json([
           'data'=>$categoryExpenditures,
         ]);
      }

      public function allExpenditures()
      {
        $allExpenditures=Expenditure::paginate(5);

        Return response()->json([
          'data'=>$allExpenditures,
        ]);
      }

      public function createExpenditures(Request $request)
      {
          $this->validate($request, [
             'total' => 'required|numeric',
             'category_id' => 'required|numeric|exists:categories,id',
             'location' => 'required',
             'date' => 'required|date',
       ]);

           $expenditure = new Expenditure();
           $expenditure->total = $request->total;
           $expenditure->category_id = $request->category_id;
           $expenditure->location = $request->location;
           $expenditure->date = $request->date;

           $expenditure->save();

           Return response()->json([
             'data'=>$expenditure,
           ]);
      }

}
