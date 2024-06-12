@extends('layouts.admin')

@section('content')
    @if (Session::has('create-food'))
        <p class="alert alert-primary">{{ Session::get('create-food') }}</p>
    @endif
    @if (Session::has('delete-food'))
        <p class="alert alert-primary">{{ Session::get('delete-food') }}</p>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Foods</h5>
                    <a href="{{ route('admin-create-foods') }}" class="btn btn-primary mb-4 text-center float-right">Create
                        Foods</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">name</th>
                                <th scope="col">image</th>
                                <th scope="col">price</th>
                                <th scope="col">category</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $index => $food)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $food->name }}</td>
                                    <td>
                                        <img width="60" height="60" src="{{ asset('img/' . $food->image . '') }}"
                                            alt="">
                                    </td>
                                    <td>${{ $food->price }}</td>
                                    <td>{{ $food->category }}</td>
                                    <td><a href="{{ route('admin-foods-delete', ['id' => $food->id]) }}"
                                            class="btn btn-danger  text-center ">delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
