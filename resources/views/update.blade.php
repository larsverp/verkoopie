@extends('layouts.app')

@section('content')
<div class="contact-clean">
        <form method="post" action="{{ route('update_product') }}">
            @csrf
            @method('PUT')
            <h2 class="text-center">Dit is de start van iets moois</h2>
            <div class="form-group"><input class="form-control" type="text" name="name" value="{{$product->name}}"></div>
            <input type="hidden" name="id" value="{{$product->id}}">
            <div class="form-group"><input class="form-control" type="text" name="price" value="{{$product->price}}"></div>
            <div class="form-group"><input class="form-control" type="text" name="thumbnail" value="{{$product->thumbnail}}"></div>
            <div class="form-group"><textarea class="form-control" name="description" rows="14">{{$product->description}}</textarea></div>
            <div class="form-group"><input class="form-control" type="submit" name="sumbit" value="Opslaan"></div>
        </form>
    </div>
@endsection