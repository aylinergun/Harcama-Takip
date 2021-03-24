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
    <br>
<!-- en az harcama -->
    <min-expenditure
    ></min-expenditure>
  <br>
<!--son harcama-->
  <div class="row">
    <div class="col-md-12 col-md-offset-0">
      <div class="panel panel-default">
        <div class="panel-body" align="center"><strong>Son harcamanın detayları</strong></div>
          <div align="center">
            <br>
            <tr>
              <td>AY: </td>
              <td align="center">{{$lastExpenditure->date}}</td>
              <br>
             <td>TUTAR: </td>
             <td align="center">{{$lastExpenditure->total}}</td>
            <br>
           <td>KATEGORİ: </td>
            <td align="center">{{$lastExpenditure->category->category_name}}</td>
            <br>
            <td>YER: </td>
            <td align="center">{{$lastExpenditure->location}}</td>
            </tr>
          </div>
        </div>
      </div>
    </div>
  </div>
<br>
    <!--yillik harcama-->
  <div class="panel panel-default">
    <div class="container">
      <div class="panel-body" align="center"><strong>YILLIK HARCAMALAR</strong></div>
        <div align="center">
          <div class="row align-items-center">
            @foreach ($annualExpenditures as $annualExpenditure)
              <div class="col-sm">
              <strong>
                <tr>
                  <td>  Yıl: </td>
                  <td>{{$annualExpenditure->year}}</td>
                      <br>
                  <td>Yıllık Toplam Harcama</td>
                       <br>
                  <td>{{$annualExpenditure->total}}</td>
                </tr>
              </strong>
                @foreach ($monthlyExpenditures as $monthlyExpenditure)
                  @if ($annualExpenditure->year==$monthlyExpenditure->year)
                    <div class="row align-items-center">
                  <tr>
                    <td> Ay:</td>
                    <td>{{Carbon\Carbon::createFromFormat('M',$monthlyExpenditure->month,'UTC')->formatLocalized('%B')}}</td>
                       <br>
                    <td>Yapılan Harcama:</td>
                    <td>{{$monthlyExpenditure->total}}</td>
                       <br>
                    <td>Harcama Sayısı:</td>
                    <td>{{$monthlyExpenditure->number_of_expenditures}}</td>
                  </tr>
                    </div>
                  @endif
                @endforeach
              </div>
           @endforeach
         </div>
       </div>
     </div>
  </div>
<br>
 <!--harcama tekrarlari-->
 <div class="panel panel-default">
   <div class="container">
     <div class="panel-body" align="center"><strong>HARCAMA YERLERİ</strong></div>
       <div align="center">
         <div class="row align-items-center">
            @foreach ($annualExpenditures as $annualExpenditure)
             <div class="col-sm2">
                 <strong>
                   <tr>
                     <td>{{$annualExpenditure->year}}</td>
                        <br>
                    </tr>
                  </strong>
                  @foreach ($expenditureLocations as $expenditureLocation)
                    @if($annualExpenditure->year==$expenditureLocation->year)
                      <div class="row align-items-center">
                        <tr>
                          <td>{{$expenditureLocation->location}} - </td>
                          <td>{{$expenditureLocation->number_of_expenditures}}</td>
                      </tr>
                    </div>
                    @endif
                    @endforeach
                  </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  <br>
<!--bu ay yapilan harcamalar-->
<div class="panel panel-default">
  <div class="container">
    <div class="panel-body" align="center"><strong>BU AY YAPILAN HARCAMALAR</strong></div>
      <div align="center">
            <div class="row">
              <table width=100% align="center">
                    <tr>
                        <td align="center"><strong>TUTAR</strong></td>
                        <br>
                        <td align="center"><strong>YER</strong></td>
                        <br>
                        <td align="center"><strong>KATEGORİ</strong></td>
                        <br>
                        <td align="center"><strong>TARİH</strong></td>
                    </tr>
                @foreach ($actualExpenditures as $actualExpenditure)
                  <tr>
                    <td align="center">{{$actualExpenditure->total}}</td>
                    <td align="center">{{$actualExpenditure->location}}</td>
                    <td align="center">{{$actualExpenditure->category->category_name}}</td>
                    <td align="center">{{$actualExpenditure->date}}</td>
                  </tr>
                @endforeach
              </table>
            </div>
         </div>
       </div>
     </div>
   </div>
 <br>
  <!--kategoriye gore harcama yeri-->
  <div class="panel panel-default">
    <div class="container">
      <div class="panel-body" align="center"><strong>Kategoriye Göre Harcama Yeri</strong></div>
        <div align="center">
          <div class="row ">
            <table width=100% align="center">
              <tr>
                @foreach ($categories as $category)
                    <div class="col">
                      <strong>{{$category->category_name}}</strong>
                        @foreach ($categoryExpenditures as $categoryExpenditure)
                          @if($categoryExpenditure->category_id==$category->id)
                            <br>

                            {{$categoryExpenditure->location}}

                          @endif
                        @endforeach
                      </div>
                  @endforeach
                </tr>
              </table>
            </div>
          </div>
       </div>
     </div>
  <br>
  <!--butun harcamalar-paginate-->
  <div class="panel panel-default">
    <div class="container">
      <div class="panel-body" align="center"><strong>Harcamalar</strong></div>
        <div align="center">
          <div class="col-sm">
            <table width=100% align="center">
              <br>
              <tr height=50>
                <td align="center"><strong>Tutar</strong></strong></strong></strong></td>
                <td align="center"><strong>Yer</strong></strong></strong></td>
                <td align="center"><strong>Kategori</strong></strong></td>
                <td align="center"><strong>Tarih</strong></td>
              </tr>
              @foreach ($allExpenditures as $allExpenditure)
                <tr>
                  <td align="center">{{$allExpenditure->total}}</td>
                  <td align="center">{{$allExpenditure->location}}</td>
                  <td align="center">{{$allExpenditure->category->category_name}}</td>
                  <td align="center">{{$allExpenditure->date}}</td>
                </tr>
              @endforeach
              </table>
              {{ $allExpenditures->links()}}
            </div>
          </div>
       </div>
     </div>
@endsection
