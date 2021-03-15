<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Harcamalar</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<style>
    body {
      background-color:#D7DBDD;
      color:#3A3845;
    }
    .container{
      background-color:#F0F2F2;
      font-style:normal;
      color: #300B20;
    }
    .row{
      padding: 10px;
      margin: 10px;
      width: auto;
    }
    .col-sm{
      width:500px;
      height:500px;
      text-align: center;
     }

     .col-sm2{
       width:200px;
       height:300px;
       text-align:center;
       padding: 20px;
       margin:30px;

     }

</style>
</head>
<body>
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
        <div class="col-md-12 col-md-offset-0">
          <div class="panel panel-default">
            <div class="panel-body" align="center"><strong>En çok harcama yapılan ay</strong></div>
              <div align="center">
                <br>
                <tr>
                 <td>AY: </td>
                 <td align="center">{{Carbon\Carbon::createFromFormat('m',$maxExpenditure->month)->formatLocalized('%B')}}</td>
                <br>
                <td>TUTAR: </td>
                <td align="center">{{$maxExpenditure->total}}</td>
                <br>
                </tr>
              </div>
            </div>
          </div>
        </div>
<!-- en az harcama -->
  <div class="row" >
    <div class="col-md-12 col-md-offset-0">
      <div class="panel panel-default">
        <div class="panel-body" align="center"><strong>En az harcama yapılan ay</strong></div>
          <div align="center">
            <br>
            <tr>
             <td>AY: </td>
             <td align="center">{{Carbon\Carbon::createFromFormat('m',$minExpenditure->month)->formatLocalized('%B')}}</td>
            <br>
            <td>TUTAR: </td>
            <td align="center">{{$minExpenditure->total}}</td>
            <br>
            </tr>
          </div>
        </div>
      </div>
    </div>
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

</body>
</html>
