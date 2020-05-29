@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach($products as $product)
                <div style="margin-top:100px;">
                    <img src="{{$product->thumbnail}}" style="width:275px;height:260px;object-fit:cover;padding-right:25px;" align="left" />
                    <a href="/product/{{$product->id}}"><h1>{{$product->name}} - €{{$product->price}}</h1></a>
                    <p> {{$product->description}}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
