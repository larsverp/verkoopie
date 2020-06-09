@extends('layouts.app')

@section('content')
<div class="article-list">
    <div class="container">
        <div class="intro">
            <div class="text-center"><input class="form-control" type="text" id="search" onkeyup="search()" placeholder="Hier begint je zoektocht" autocomplete="false"></div>
            <h2 class="text-center">Alle producten</h2>
        </div>
        <div class="row articles">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 item" data-name="{{ $product->name }}"><a href="/product/{{$product->id}}"><img class="img-fluid" style="width:300px;height:260px;object-fit:cover;" src="{{$product->thumbnail}}"></a>
                <h3 class="name">{{$product->name}} - €{{$product->price}}</h3>
                <p class="description">{{ substr($product->description, 0,  250)."..." }}</p><a class="action" href="/product/{{$product->id}}"><i class="fa fa-arrow-circle-right"></i></a>
                @if(Auth::user()->isAdmin)
                    <form method="post" action="product/{{$product->id}}"> 
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit"> Verwijder </button>
                    </form>
                @endif
            </div>
            @endforeach
        </div>
        <div class="intro" id="nope" hidden="true"><h5 class="text-center">Helaas hebben we niet gevonden wat je zoekt :(</h5></div>
    </div>
</div>

<script>
    function search(){
        var data = document.querySelectorAll('.row.articles > *');
        var searchTerm = document.getElementById('search').value;
        var foundOne = false;

        data.forEach((product) => {
            product.hidden = false;

            var name = product.getAttribute('data-name');
            var matchSearchTerm = new RegExp(searchTerm, 'i');

            if (!name.match(matchSearchTerm)){
                product.hidden = true;
            }
            else{
                foundOne = true;
            }
        });

        document.getElementById('nope').hidden = foundOne;
    }
</script>
@endsection