@extends('layouts/app')

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

    <div class="container">
        @if (Session::has('message'))
            <p class="alert alert-primary">{{ Session::get('message') }}</p>
        @endif
    </div>
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-6">
                    <div class="row g-3">
                        <div class="col-12 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s"
                                src="{{ asset('img/' . $food->image) }}">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4">{{ $food->name }}</h1>
                    <p class="mb-4">{{ $food->description }}</p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h3>Price: $ {{ $food->price }} </h3>
                            </div>
                        </div>

                    </div>
                    <form method="POST" action="/foods/{{ $food->slug }}">
                        @csrf
                        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                        <input type="text" name="food_id" value="{{ $food->id }}" hidden>
                        <input type="text" name="food_name" value="{{ $food->name }}" hidden>
                        <input type="text" name="food_price" value="{{ $food->price }}" hidden>
                        <input type="text" name="food_image" value="{{ $food->image }}" hidden>
                        @if ($cartVerifying > 0)
                            <button disabled class="btn btn-primary py-3 px-5 mt-2">Added to
                                Cart</button>
                        @else
                            <button type="submit" name="submit" class="btn btn-primary py-3 px-5 mt-2">Add to
                                Cart</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
