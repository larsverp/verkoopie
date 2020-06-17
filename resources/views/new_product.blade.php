@extends('layouts.app')

@section('content')
<div class="contact-clean">
        <form method="post" id="new" action="{{ route('new_product') }}">
            @csrf
            <h2 class="text-center">Dit is de start van iets moois</h2>
            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Naam van je product"></div>
            <div class="form-group"><input class="form-control" type="text" name="price" placeholder="Prijs van je product"></div>
            <div class="form-group"><input class="form-control" type="text" name="thumbnail" placeholder="Een foto van je product"></div>
            <div class="form-group"><textarea class="form-control" name="description" placeholder="Omschrijving" rows="14"></textarea></div>
            Selecteer een of meerdere categorie:<br>
            <select form="new" name="categories[]" multiple>
                @foreach(App\Categories::all() as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                @endforeach
            </select>
            <div class="form-group"><input class="form-control" type="submit" name="sumbit" value="Opslaan"></div>
        </form>
    </div>
@endsection