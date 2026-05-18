@extends('layouts.admin_app')

<link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

@section('admin_content')
<div class="container">
    <h2 class="text-center mt-3">Manage User Deposit Balances</h2>
    
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Deposit Balance</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>${{ number_format($user->balance->balance ?? 0, 2) }}</td>
                        <td>
                            <form action="{{ route('admin.balance.update', $user->id) }}" method="POST" class="d-flex align-items-center">
                                @csrf
                                <input type="number" step="0.01" name="balance" class="form-control me-2" value="{{ $user->balance->balance ?? 0 }}" required style="max-width: 120px;">
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