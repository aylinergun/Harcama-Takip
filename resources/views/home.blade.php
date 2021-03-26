@extends('layouts.app')
@section('content')

    <div style="background-color:lightblue">
           @foreach ($errors->all() as $error)
             <li>{{$error}}</li>
           @endforeach
       </div>

     <form method="post" action="{{url('/expenditures')}}" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="container" align="left">
        <h3>Harcama Bilgileri</h3>
      </hr>
      <br>
      <div class="form-group">
        <label for="total">Toplam Tutar:</label>
        <input type="text" name="total" id="total" class="form-group" value="{{old('total')}}" required>
      </div>
    <div class="form-group">
      <label for="location">Harcama Yeri:</label>
      <input type="text" name="location" id="location" class="form-group" value="{{old('location')}}">
    </div>
    <label >Kategori :</label>
    <select name="category_id">
      <option value="" required>Seçim Yapınız</option>
      @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->category_name}}</option>
      @endforeach
    </select>
    <div>
      <br>
      <label for="date">Harcama Tarihi:</label>
      <input type="date" name="date" id="date" class="form-group" value="{{old('date')}}" required>
    </div>
    <button type="submit" class="btn btn-primary btn-success">Gönder</button>
  </div>
<br><br>
  <!--en cok harcama yapilan -->

    <div class="container">
      <div class="row" >
       <max-expenditure
       ></max-expenditure>
     </div>
     <br>
     <div class="row" >
       <min-expenditure
       ></min-expenditure>
     </div>
     <br>
     <div class="row" >
      <last-expenditure
      ></last-expenditure>
    </div>
    </div>
<br>
    <!--yillik harcama-->
<div class="container">
      <div class="row">
        <annual-expenditures
        ></annual-expenditures>
      </div>
      <div class="row">
        <monthly-expenditures
        ></monthly-expenditures>
      </div>
</div>
<br>
 <!--harcama tekrarlari-->
   <div class="container">
      <expenditure-locations
      ></expenditure-locations>
      </div>
  <br>
<!--bu ay yapilan harcamalar-->
<div class="panel panel-default">
  <actual-expenditures
  ></actual-expenditures>
   </div>
 <br>
  <!--kategoriye gore harcama yeri-->
  <div class="panel panel-default">
   <category-expenditures
   ></category-expenditures>
     </div>
  <br>
  <!--butun harcamalar-paginate-->
  <div class="panel panel-default">
    <all-expenditures
    ><all-expenditures>
     </div>
@endsection
