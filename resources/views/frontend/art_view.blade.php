@extends('frontend.main_master')
@section('content')
    <br><br><br><br><br>
    <div class="container wrapper hoc clear">
        <img src="{{ asset($art->art_image) }}"><br><br><br>
        <h1><b>Item Name :</b> </h1> <h2>{{ $art->art_name }}</h2><br>
        <h3><b>Item Description :</b> <br> {{ $art->description }}</h3><br><br><br>
        <h3><b>Item Description :</b> <br> {{ $art->price }}</h3><br><br><br>

        <a href="#" class="btn btn-info">Buy Now</a>
    </div>
@endsection
