<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return view('miembroPremium.index');
        } else {
            return redirect('/login');
        }
    }

    public function processPaypal(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('processSuccess'),
                "cancel_url" => route('processCancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "EUR",
                        "value" => "0.99"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('miembroPremium/index')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('miembroPremium/index')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function processSuccess(Request $request)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            Auth::user()->assignRole('premium');
            return redirect()
                ->route('miembroPremium/index')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('miembroPremium/index')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function processCancel(Request $request)
    {
        return redirect()
            ->route('miembroPremium/index')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}