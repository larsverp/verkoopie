@extends('layouts.app')

@section('content')
<div class="article-list">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Jouw producten</h2>
        </div>
        <div class="row articles">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" style="width:300px;height:260px;object-fit:cover;" src="{{$product->thumbnail}}"></a>
                <h3 class="name">{{$product->name}} - €{{number_format((float)$product->price, 2, '.', '')}}</h3>
                <p class="description">{{ substr($product->description, 0,  250)."..." }}</p>
                <form method="post" action="product/{{$product->id}}"> 
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit"> Verwijder </button>
                </form>

                <a href="myproduct/{{$product->id}}">UPDATE</a>
                
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection