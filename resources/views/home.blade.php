<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">
          <div class="panel-body"><strong>HARCAMALAR</strong></div>
          <br>
            <table width=100½>
              <tr height="60">
                        <td align="center"><strong>Tutar</strong></td>
                        <td align="center"><strong>Yer</strong></td>
                        <td align="center"><strong>Kategori</strong></td>
                        <td align="center"><strong>Tarih</strong></td>
                      </tr>
              @foreach ($expenditures as $expenditure)
                <tr height="60">
                        <td align="center">{{$expenditure->total}}</td>
                        <td align="center">{{$expenditure->location}}</td>
                        <td align="center">{{$expenditure->category->category_name}}</td>
                        <td align="center">{{$expenditure->date}}</td>
                </tr>
             @endforeach
            </table>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>
