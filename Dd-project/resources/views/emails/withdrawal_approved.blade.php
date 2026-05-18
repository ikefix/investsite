<!DOCTYPE html>
<html>
<head>
    <title>Withdrawal Approved</title>
</head>
<body>
    <p>Hello {{ $withdrawal->user->name }},</p>
    <p>We’ve received your withdrawal request of <strong>${{ number_format($withdrawal->amount, 2) }}</strong> and it’s currently being processed.</p>
    <p>Wallet Address: {{ $withdrawal->wallet_address }}</p>
    <p>You’ll receive another update once it’s been finalized. Thanks for your patience and for choosing our platform!</p>
    <p>Thank you for using our service!</p>
</body>
</html>
