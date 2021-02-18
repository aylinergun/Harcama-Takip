<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Harcamalar</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div align="right">
    <strong><a href="{{route('create')}}">Geri Dön</a></strong>
  </div>
  <form method="post" action="{{url('/expenditures')}}" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="container">
      <h3>Harcama Bilgileri</h3>
    </hr>
    <br>
    <div class="form-group">
      <label for="total">Toplam Tutar:</label>
      <input type="text" name="total" id="total" class="form-group" required>
    </div>
<!--
    <div class="form-group">
      <label for="category">Kategori:</label>
      <input type="text" name="category" id="category_id" class="form-group">
    </div>
-->
    <div>
      <label for="date">Harcama Tarihi:</label>
      <input type="date" name="date" id="date" class="form-group" required>
    </div>

    <div class="form-group">
      <label for="location">Harcama Yeri:</label>
      <input type="text" name="location" id="location" class="form-group">
    </div>

    <button type="submit" class="btn btn-primary btn-success">Gönder</button>
  </div>
