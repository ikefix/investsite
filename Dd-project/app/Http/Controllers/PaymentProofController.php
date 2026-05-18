<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Models\PaymentProof;
use App\Events\NewPaymentProofUploaded;
use App\Mail\PaymentProofUploaded;

class PaymentProofController extends Controller
{
    // Store uploaded payment proof
    public function store(Request $request)
    {
        $request->validate([
            'proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'plan' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        // Store file in 'proofs' folder inside storage/app/public
        $filename = time() . '_' . $request->file('proof')->getClientOriginalName();
        $path = $request->file('proof')->storeAs('proofs', $filename, 'public');

        // Save proof details in database
        $paymentProof = PaymentProof::create([
            'plan' => $request->input('plan'),
            'payment_method' => $request->input('payment_method'),
            'file_path' => $path,
            'status' => 'pending',
            'keyword' => 'invest',
        ]);

        // Trigger event to notify admin
        event(new NewPaymentProofUploaded($paymentProof));

        // Send email to user
        $user = auth()->user();
        if ($user && $user->email) {
            Mail::to($user->email)->send(new PaymentProofUploaded($user, $request->plan, $request->payment_method));
        }

        return back()->with('success', 'Payment proof uploaded and confirmation sent to your email.');
    }

    // Display all payment proofs in admin notifications
    public function index()
    {
        $paymentProofs = PaymentProof::all();
        return view('admin.notification', compact('paymentProofs'));
    }

    // Confirm payment proof (Admin action)
    public function confirmProof($id)
    {
        $proof = PaymentProof::findOrFail($id);
        $proof->status = 'confirmed';
        $proof->save();

        return redirect()->route('admin.notifications')->with('success', 'Payment proof confirmed.');
    }
    

}
