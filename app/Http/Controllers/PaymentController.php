<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Xentixar\EsewaSdk\Esewa;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'tax_amount' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'product_code' => 'required|string',
        ]);

        // Generate unique transaction UUID
        $uuid = (string) Str::uuid();

        $amount = $request->total_amount;

        // Absolute URLs (VERY IMPORTANT)
        $successUrl = route('payment.success');
        $failureUrl = route('payment.failure');

        $esewa = new Esewa;

        $esewa->config(
            $successUrl,
            $failureUrl,
            $amount,
            $uuid
        );

        try {
            $paymentUrl = $esewa->init();

            return redirect()->away($paymentUrl);
        } catch (\Exception $e) {
            return back()->with('error', 'Payment failed: '.$e->getMessage());
        }
    }

    // ✅ SUCCESS CALLBACK
    public function paymentSuccess(Request $request)
    {
        // VERY IMPORTANT: verify payment
        if (! $request->has('data')) {
            return redirect()->route('home')->with('error', 'Invalid payment response');
        }

        try {
            $decoded = json_decode(base64_decode($request->data), true);


            if ($decoded && isset($decoded['status']) && $decoded['status'] === 'COMPLETE') {
                return redirect()->route('home')->with('success', 'Payment successful!');
            }

            return redirect()->route('home')->with('error', 'Payment not completed');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Verification failed');
        }
    }

    public function paymentFailure()
    {
        return redirect()->route('home')->with('error', 'Payment failed');
    }
}
