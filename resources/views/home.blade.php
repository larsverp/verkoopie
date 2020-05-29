@extends('layouts.app')

@section('content')
<div class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Niewste producten</h2>
                <p class="text-center">Deze producten zijn recentelijk toegevoegd en misschien wel iets voor jou?</p>
            </div>
            <div class="row articles">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" style="width:300px;height:260px;object-fit:cover;" src="{{$product->thumbnail}}"></a>
                    <h3 class="name">{{$product->name}} - €{{$product->price}}</h3>
                    <p class="description">{{ substr($product->description, 0,  250)."..." }}</p><a class="action" href="/product/{{$product->id}}"><i class="fa fa-arrow-circle-right"></i></a></div>
            @endforeach
        </div>
        </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
@endsection