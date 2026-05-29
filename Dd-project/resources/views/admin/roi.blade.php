@extends('layouts.admin_app')

<link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

@section('admin_content')

<h2>All Users</h2>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Deposit Balance</th>
            <th>ROI Balance</th>
            <th>Update ROI</th>
        </tr>
    </thead>

    <tbody>

    @foreach($users as $user)

        <tr>
            <td>{{ $user->name }}</td>

            <td>{{ $user->email }}</td>

            <td>
                ${{ number_format($user->depositBalance->balance ?? 0, 2) }}
            </td>

            <td>
                ${{ number_format($user->roiBalance->balance ?? 0, 2) }}
            </td>

            <td>

                <form action="{{ route('admin.users.update.roi', $user->id) }}" method="POST">

                    @csrf

                    <input type="number"
                           name="balance"
                           step="0.01"
                           value="{{ $user->roiBalance->balance ?? 0 }}">

                    <button type="submit">
                        Update ROI
                    </button>

                </form>

            </td>
        </tr>

    @endforeach

    </tbody>
</table>

@endsection