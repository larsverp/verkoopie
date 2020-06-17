@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div style="margin-top:100px;">
                <img src="{{$product->thumbnail}}" style="width:275px;height:260px;object-fit:cover;padding-right:25px;" align="left" />
                <h1>{{$product->name}} - €{{number_format((float)$product->price, 2, '.', '')}}</h1>
                <p> {{$product->description}}</p>
                <h2>Categorieën:</h2>
                @foreach($product->getCategories() as $category)
                    <p> {{$category->name}} </p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection