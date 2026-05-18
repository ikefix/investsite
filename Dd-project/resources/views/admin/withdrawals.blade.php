@extends('layouts.admin_app')

<link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

@section('admin_content')
<div class="container withdrawal-requests-container">
    <h2 class="text-center">Withdrawal Requests</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>User</th>
                    <th>Wallet Address</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($withdrawals as $withdrawal)
                    <tr>
                        <td>{{ $withdrawal->user->name }}</td>
                        <td class="wallet-address">{{ $withdrawal->wallet_address }}</td>
                        <td>${{ number_format($withdrawal->amount, 2) }}</td>
                        <td>
                            <span class="badge {{ $withdrawal->status == 'pending' ? 'bg-warning' : 'bg-secondary' }}">
                                {{ ucfirst($withdrawal->status) }}
                            </span>
                        </td>
                        <td>
                            @if($withdrawal->status == 'pending')
                                <a href="{{ route('admin.withdrawal.update', ['id' => $withdrawal->id, 'action' => 'approve']) }}" class="btn btn-success btn-sm">Approve</a>
                                <a href="{{ route('admin.withdrawal.update', ['id' => $withdrawal->id, 'action' => 'decline']) }}" class="btn btn-danger btn-sm">Decline</a>
                            @else
                                <span class="text-muted">No Action</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
