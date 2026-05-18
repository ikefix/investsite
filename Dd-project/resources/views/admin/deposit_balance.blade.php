@extends('layouts.admin_app')

<link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

@section('admin_content')
    <div class="container">
        <h2 class="text-center mt-3">Manage User Invest Balances</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Invest Balance</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>${{ $user->depositBalance->balance ?? 0 }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.update-user-balance', $user->id) }}" class="d-flex align-items-center">
                                    @csrf
                                    @method('PUT')

                                    <input type="number" name="balance" class="form-control me-2" value="{{ $user->depositBalance->balance ?? 0 }}" required style="max-width: 120px;">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection