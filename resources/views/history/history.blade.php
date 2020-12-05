@extends('header')
@section('title', 'Order')
@section('content')

    <div class="container h-100 my-5">
        @if ($count < 1)
            <div class="d-flex flex-column align-items-center justify-content-center">
                <p>There is no data...</p>
                <button class="btn btn-dark" onclick="location.href='{{ url('/order') }}';">Order Now</button>
            </div>

        @else

            <div class="text-center">
                <h1 class="page-title">History</h1>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Buyer Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($orders as $ord)

                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$ord->name}}</td>
                        <td>{{$ord->buyer_name}}</td>
                        <td>{{$ord->buyer_contact}}</td>
                        <td>${{$ord->amount}}.00</td>

                        @endforeach
                    </tr>
                </tbody>
            </table>
        @endif
    </div>

@endsection
