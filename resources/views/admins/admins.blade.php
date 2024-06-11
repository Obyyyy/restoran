@extends('layouts.admin')

@section('content')
    <div class="container">
        @if (Session::has('admin'))
            <p class="alert alert-primary">{{ Session::get('admin') }}</p>
        @endif
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Admins</h5>
                    <a href="{{ route('create-admin') }}" class="btn btn-primary mb-4 text-center float-right">Create
                        Admins</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $index => $admin)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
