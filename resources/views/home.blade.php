@extends('layouts.app')

@section('content')

<style>
#aku {
    text-decoration: none;
    color: black;
}
</style>


<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}
</script>

<link href="{% static 'vendor/bootstrap/css/bootstrap.min.css' %}" rel="stylesheet">

<div class="container">
  


<!-- Post Content Column -->
@foreach($datas as $index => $data)
<div class="col mb-4">
    <div class="card w-75 h-100" >
    <div class="card-header"><h4> <b><a id="aku" style="text-decoration: none;" href="{{ route('detil_post',['id' => $data->id]) }}">{{ $data->title }}</a></b></h4></div>
      <div class="card-body">
        <!-- <h5 class="card-title"></h5> -->
        <pre class="card-text">{!! Str::words($data->content,200) !!}</pre>
        
      </div>
    <div class="card-footer">
      <small class="text-muted"><a href="{{ route('detil_post',['id' => $data->id]) }}" class="btn btn-primary">Read More...</a></small>
    </div>
    </div>
    </div>
@endforeach

@endsection
