@extends('layouts.admin_app')

<link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

@section('admin_content')
<div class="container">
    <h1 class="notification-header">Investment Notifications</h1>

    @foreach($paymentProofs as $proof)
    <div class="notification-card">
        <div class="notification-info">
            <p><strong>Plan:</strong> {{ $proof->plan }}</p>
            <p><strong>Payment Method:</strong> {{ $proof->payment_method }}</p>
            <p><strong>Keyword:</strong> <span class="keyword-tag">{{ $proof->keyword }}</span></p>
            <p><strong>Status:</strong> 
                <span class="status-badge {{ $proof->status === 'confirmed' ? 'confirmed' : 'pending' }}">
                    {{ ucfirst($proof->status) }}
                </span>
            </p>
        </div>

        {{-- Display proof image --}}
        @if($proof->file_path)
        <div class="proof-image">
            <img src="{{ asset('storage/' . $proof->file_path) }}" 
                 alt="Payment Proof" 
                 class="clickable-img"
                 onclick="openModal('{{ asset('storage/' . $proof->file_path) }}')">
        </div>
        @else
        <p class="no-proof">No proof uploaded</p>
        @endif

        {{-- Confirmation button --}}
        @if($proof->status !== 'confirmed')
        <form action="{{ route('admin.confirm-proof', $proof->id) }}" method="POST" class="confirmation-form">
            @csrf
            @method('PUT')
            <button type="submit" class="confirm-btn">Confirm Payment</button>
        </form>
        @endif
    </div>
    @endforeach
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

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher('YOUR_PUSHER_KEY', {
        cluster: 'YOUR_CLUSTER'
    });

    var channel = pusher.subscribe('admin-notifications');
    channel.bind('App\\Events\\NewPaymentProofUploaded', function(data) {
        alert('New payment proof uploaded for: ' + data.paymentProof.plan);
        location.reload();
    });
</script>
@endsection