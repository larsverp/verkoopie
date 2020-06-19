@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="article-list">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Categorieën:</h2>
        </div>
        <table border=1 style="width: 100%;">
            <tr>
                <th>Naam</th>
                <th>Update</th>
                <th>verwijder</th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td> {{$category->name}} </td>
                <td><a href="/categories/update/{{$category->id}}">Update</a></td>
                <td>
                    <form method="post" action="/categories/{{$category->id}}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit"> Verwijder </button>
                    </form>
                </td>
                </form>
            </tr>
            @endforeach
        </table><br>
        <form action="/categories" method="POST">
            @csrf
            <input name="name" type="text" placeholder="Naam van de categorie">
            <input type="submit" value="Toevoegen">
        </form>
    </div>
</div>
@endsection