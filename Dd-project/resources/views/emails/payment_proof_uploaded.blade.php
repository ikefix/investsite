<!DOCTYPE html>
<html>
<head>
    <title>Payment Proof Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f4f4f4; padding: 30px;">
    <div style="background: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto;">
        <h2 style="color: #4CAF50;">Payment Proof Submitted</h2>
        <p>Hi {{ $user->name }},</p>

        <p>We’ve received your proof of payment for the plan:</p>

        <p><strong>Plan:</strong> {{ $plan }}</p>
        <p><strong>Payment Method:</strong> {{ $paymentMethod }}</p>

        <p>Our team will review and confirm it shortly. You’ll receive a notification once it's approved.</p>

        <p style="margin-top: 20px;">Thanks for choosing us!</p>
        <p>— The Support Team</p>
    </div>
</body>
</html>
