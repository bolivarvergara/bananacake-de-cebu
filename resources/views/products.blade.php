@extends('layout')

@section('content')

<h1>Products</h1>

<div style="display:flex;flex-wrap:wrap;gap:20px;">

@foreach($products as $product)

<div style="
    width:220px;
    border:1px solid #ddd;
    border-radius:10px;
    padding:15px;
    text-align:center;
    box-shadow:0 2px 5px rgba(0,0,0,.1);
">
    <img src="/images/products/{{ $product['image'] }}"
         width="180">

    <h3>{{ $product['name'] }}</h3>

    <p>₱{{ $product['price'] }}</p>
</div>

@endforeach

</div>

@endsection