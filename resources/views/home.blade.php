<!DOCTYPE html>
<html lang="en">
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

    .row {
      background-color:#F7ECE5;
      font-family:fantasy;
      height: 150px ;
      width: 400px;
      margin: 10px;
      float: left;

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
        <input type="text" name="total" id="total" class="form-group" required>
      </div>
    <div class="form-group">
      <label for="location">Harcama Yeri:</label>
      <input type="text" name="location" id="location" class="form-group">
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
      <input type="date" name="date" id="date" class="form-group" required>
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
                <tr>
                 <td>AY: </td>
                 <td align="center">{{$maxExpenditure->month}}</td>
                <br>
                <td>TUTAR: </td>
                <td align="center">{{$maxExpenditure->total}}</td>
                <br>
                <td>YER: </td>
                <td align="center">{{$maxExpenditure->location}}</td>
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
            <tr>
             <td>AY: </td>
             <td align="center">{{$minExpenditure->month}}</td>
            <br>
            <td>TUTAR: </td>
            <td align="center">{{$minExpenditure->total}}</td>
            <br>
            <td>YER: </td>
            <td align="center">{{$minExpenditure->location}}</td>
            </tr>
          </div>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-12 col-md-offset-0">
      <div class="panel panel-default">
        <div class="panel-body" align="center"><strong>Son harcamanın detayları</strong></div>
          <div align="center">
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
</body>
</html>
