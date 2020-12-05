@extends('header')
@section('title', 'Products')
@section('content')

    <div class="container h-100 my-5">
        @if ($count < 1)
            <div class="d-flex flex-column align-items-center justify-content-center">
                <p>There is no data...</p>
                <button class="btn btn-dark" onclick="location.href='{{ url('/products/input') }}';">Add Product</button>
            </div>

        @else
            <div class="text-center">
                <h1 class="page-title">List Product</h1>
            </div>
            <button class="btn btn-dark my-2" onclick="location.href='{{ url('/products/input') }}';">Add Product</button>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $prod)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $prod->name }}</td>
                            <td>${{ $prod->price }}.00</td>
                            <td>
                                <button class="btn btn-info"
                                    onclick="location.href='{{ url('/products/details') . '/' . $prod->id }}';">Edit</button>
                                <button class="btn btn-danger" type="button"
                                    onclick="location.href='{{ url('/products/delete') . '/' . $prod->id }}'">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection
