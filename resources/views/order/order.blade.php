@extends('header')
@section('title', 'Order')
@section('content')

    <div class="container h-100 pt-5 mb-5">
        @if ($count < 1)
        <div class="d-flex flex-column align-items-center justify-content-center">
            <p>There is no data...</p>
            <button class="btn btn-dark" onclick="location.href='{{ url('/products/input') }}';">Add Product</button>
        </div>

        @else


            <div class="text-center">
                <h1 class="page-title">Order</h1>
            </div>

            <div class="row">
                @foreach ($products as $prod)
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ url('/images/products').'/'.$prod->img_path }}"
                            alt="Image of {{$prod->name}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$prod->name}}</h5>
                            <p class="card-text">{{$prod->description}} </p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text price-tag">${{$prod->price}}.00</p>
                            <a href="{{ url('/order/detail/').'/'.$prod->id }}" class="btn btn-success">Order Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection
