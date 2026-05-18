@extends('layouts.admin_app')

<link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

@section('admin_content')
<div class="container">
    <h1 class="notification-header">Deposit Notifications</h1>

    @if($deposits->isEmpty())
        <p class="no-deposits">No deposit notifications available.</p>
    @else
        @foreach($deposits as $deposit)
            <div class="notification-card">
                <div class="notification-info">
                    <p><strong>Keyword:</strong> <span class="keyword-tag">{{ ucfirst($deposit->keyword) }}</span></p>
                    <p><strong>Payment Method:</strong> {{ ucfirst($deposit->payment_method) }}</p>
                    <p><strong>Status:</strong> 
                        <span class="status-badge {{ $deposit->status === 'confirmed' ? 'confirmed' : 'pending' }}">
                            {{ ucfirst($deposit->status) }}
                        </span>
                    </p>
                    <p><strong>Wallet Address (Proof of Payment):</strong> {{ $deposit->wallet_proof }}</p>
                </div>

                {{-- Display proof image --}}
                <div class="confirmDiv">
                    @if($deposit->file_path)
                    <div class="proof-image">
                        <p><strong>Proof of Payment:</strong></p>
                        <img src="{{ asset('storage/' . $deposit->file_path) }}" 
                            alt="Payment Proof" 
                            class="clickable-img"
                            onclick="openModal('{{ asset('storage/' . $deposit->file_path) }}')">
                    </div>
                    @else
                        <p class="no-proof">No proof uploaded</p>
                    @endif

                    {{-- Confirmation button --}}
                    @if($deposit->status !== 'confirmed')
                    <form action="{{ route('admin.confirm-deposit', $deposit->id) }}" method="POST" class="confirmation-form">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="confirm-btn">Confirm Deposit</button>
                    </form>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
</div>

{{-- Image Modal --}}
<div id="imageModal" class="modal">
    <span class="close-btn" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImg">
</div>

<script>
    function openModal(imageSrc) {
        document.getElementById("imageModal").style.display = "flex";
        document.getElementById("modalImg").src = imageSrc;
    }

    function closeModal() {
        document.getElementById("imageModal").style.display = "none";
    }
</script>

@endsection
