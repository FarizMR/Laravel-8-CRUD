@extends('header')
@section('title', 'Order')
@section('content')

    <div class="container">
        <div class="text-center">
            <h1 class="page-title">Order</h1>
        </div>

        <div class="row d-flex flex-column align-items-center justify-content-center">
            <div class="col-10">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ url('/images/products/').'/'.$product->img_path }}" class="card-img img-fluid"
                                alt="Nike Zoom Pegasus 35">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text"><small class="text-muted">Stock : {{ $product->stock }}</small></p>
                                <p class="price-tag">${{ $product->price }}.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-5">
                    <h1 class="page-title text-center">
                        Buyer Information
                    </h1>
                    <div class="mx-5">
                        <form method="POST" action="/orders/detail/storeOrder" enctype="multipart/form-data">
                            @csrf
                            <input name="product_id" type="hidden" value="{{$product->id}}">
                            <div class="form-group">
                                <label for="OrderName">Name</label>
                                <input name="buyer_name" type="text" class="form-control" id="OrderName" placeholder="Enter your name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="OrderContact">Contact</label>
                                <input name="buyer_contact" type="text" class="form-control" id="OrderContact" placeholder="Enter your contact"
                                    required>
                            </div>
                            <div class="col-4 p-0">
                                <div class="form-group">
                                    <label for="OrderQty">Quantity</label>
                                    <input name="quantity" type="text" class="form-control" id="OrderQty" placeholder="Enter quantity"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
