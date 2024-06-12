@extends('layouts.admin')

@section('content')
    @if (Session::has('delete-booking'))
        <p class="alert alert-primary">{{ Session::get('delete-booking') }}</p>
    @endif
    @if (Session::has('edit-booking'))
        <p class="alert alert-primary">{{ Session::get('edit-booking') }}</p>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Bookings</h5>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">date</th>
                                <th scope="col">Number People</th>
                                <th scope="col">Request</th>
                                <th scope="col">status</th>
                                <th scope="col">button</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $index => $booking)
                                <tr>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ $booking->num_people }}</td>
                                    <td>{{ $booking->spe_request }}</td>
                                    <td>{{ $booking->status }}</td>
                                    <td><a href="{{ route('admin-bookings-edit', ['id' => $booking->id]) }}"
                                            class="btn btn-warning text-white text-center ">change
                                            status</a> <br> <a
                                            href="{{ route('admin-bookings-delete', ['id' => $booking->id]) }}"
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
