@extends('layouts.app')
@section('content')

    <create-expenditure
      :categories="{{$categories}}"
    ></create-expenditure>

    <div class="container">
      <div class="row" >
        <div class="col-sm">
       <max-expenditure
       ></max-expenditure>
     </div>
     <br>
        <div class="col-sm">
       <min-expenditure
       ></min-expenditure>
     </div>
     <br>
       <div class="col-sm">
      <last-expenditure
      ></last-expenditure>
    </div>
  </div>
</div>

<div class="container">

        <annual-expenditures
         :years="{{json_encode($years)}}"
          :total-expenditure-yearly="{{$totalExpenditureYearly}}"
          :annual-expenditures="{{$annualExpenditures}}"
        ></annual-expenditures>
</div>

<div class="container">
      <expenditure-location-count
         :expenditure-location-count="{{$expenditureLocationCount}}"
         :years="{{json_encode($years)}}"
      ></expenditure-location-count>
</div>

<div class="container">
       <current-month-expenditure
        :current-month-expenditure="{{$currentMonthExpenditure}}"
        :categories="{{$categories}}"
      ></actual-expenditures>
</div>

<div class="container">
       <category-expenditures
          :categories="{{$categories}}"
       ></category-expenditures>
</div>

<div class="container">
    <all-expenditures
    ><all-expenditures>
</div>


@endsection
