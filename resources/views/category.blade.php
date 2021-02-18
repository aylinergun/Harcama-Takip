<h2>Harcama Kategorileri</h2
<ul>
  @foreach ($categories as $category)
    <li>{{$category->category_name}}</li>
  @endforeach
</ul>
