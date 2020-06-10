@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div style="margin-top:100px;">
                <img src="{{$product->thumbnail}}" style="width:275px;height:260px;object-fit:cover;padding-right:25px;" align="left" />
                <h1>{{$product->name}} - €{{number_format((float)$product->price, 2, '.', '')}}</h1>
                <p> {{$product->description}}</p>
                <h1>Hier komt nog meer te staan</h1>
            </div>
        </div>
    </div>
</div>
@endsection