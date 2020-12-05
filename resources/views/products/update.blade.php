@extends('header')
@section('title', 'Products')
@section('content')

    <div class="container">
        <h1 class="page-title text-center">Update Product</h1>

        <div class="row d-flex flex-column align-items-center justify-content-center">
            <div class="col-8">
                <form method="POST" action="/products/update/{{$product->id}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="form-group">
                        <label for="ProductName">Product Name</label>
                        <input name="name" value="{{$product->name}}" type="text" class="form-control" id="ProductName" placeholder="Enter the product name">
                    </div>
                    <div class="form-group">
                        <label for="ProductPrice">Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$ USD</div>
                            </div>
                            <input name="price" value="{{$product->price}}" type="text" class="form-control" id="ProductPrice" placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descriptionProduct">Description</label>
                        <textarea name="description" class="form-control" id="descriptionProduct" rows="5">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group col-6 px-0">
                        <label for="ProductStock">Stock</label>
                        <input name="stock" value="{{$product->stock}}" type="text" class="form-control" id="ProductStock" placeholder="Stock">
                    </div>
                    <div class="form-group">
                        <label for="ProductImage">Image file input</label>
                        <input name="img" type="file" class="form-control" id="ProductImage">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
