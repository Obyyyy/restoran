@extends('layouts.admin')

@section('content')
    @if (Session::has('delete-order'))
        <p class="alert alert-primary">{{ Session::get('delete-order') }}</p>
    @endif
    @if (Session::has('edit-order'))
        <p class="alert alert-primary">{{ Session::get('edit-order') }}</p>
    @endif

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Orders</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">town</th>
                                <th scope="col">country</th>
                                <th scope="col">address</th>
                                <th scope="col">price</th>
                                <th scope="col">status</th>
                                <th scope="col">button</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                                <tr>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->town }}</td>
                                    <td>{{ $order->country }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td><a href="{{ route('admin-orders-edit', ['id' => $order->id]) }}"
                                            class="btn btn-warning text-white text-center ">change
                                            status</a> <a href="{{ route('admin-orders-delete', ['id' => $order->id]) }}"
                                            class="btn btn-danger  text-center ">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
