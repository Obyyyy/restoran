@extends('layouts.app')

@section('content')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Cart</a></li>
                </ol>
            </nav>
        </div>
    </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Service Start -->
    <div class="container">
        @if (Session::has('message'))
            <p class="alert alert-primary">{{ Session::get('message') }}</p>
        @endif

        @if ($cartItems->count() > 0)
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <th><img src="{{ asset('img/' . $item->food_image) }}" alt=""
                                        class="img-fluid rounded" style="width: 80px;"></th>
                                <td>{{ $item->food_name }}</td>
                                <td>${{ $item->food_price }}</td>
                                <td><a href="/cart/delete/{{ $item->id }}" class="btn btn-danger text-white">delete</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="position-relative mx-auto fw-medium" style="max-width: 400px; padding-left: 679px;">
                    <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5 fw-medium" type="text"> Total:
                        ${{ $price }}
                    </p>
                    <form method="POST" action="{{ route('prepare-checkout') }}">
                        @csrf
                        <input type="text" name="price" value="{{ $price }}" hidden>
                        <button type="submit" name="submit"
                            class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
                    </form>
                </div>
            </div>
        @else
            <h3 class="alert alert-primary text-center">You have no items in cart yet</h3>
        @endif
    </div>
    <!-- Service End -->
@endsection
