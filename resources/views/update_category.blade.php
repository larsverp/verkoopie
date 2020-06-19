@extends('layouts.app')

@section('content')
<div class="contact-clean">
        <form method="post" id="new" action="/categories/{{$category->id}}">
            @csrf
            {{ method_field('PUT') }}
            <h2 class="text-center">Update</h2>
            <div class="form-group"><input class="form-control" type="text" name="name" value="{{$category->name}}"></div>
            <div class="form-group"><input class="form-control" type="submit" name="sumbit" value="Opslaan"></div>
        </form>
    </div>
@endsection