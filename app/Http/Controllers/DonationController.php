<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:donor');
    }

    public function create()
    {
        return view('donations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|in:stripe,paypal',
            'notes' => 'nullable|string|max:500',
        ]);

        $donation = Donation::create([
            'donor_id' => Auth::guard('donor')->id(),
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'payment_status' => 'pending',
            'notes' => $validated['notes'] ?? null,
        ]);

        if ($validated['payment_method'] === 'stripe') {
            return $this->processStripePayment($donation);
        }

        return redirect()->route('donations.show', $donation);
    }

    private function processStripePayment(Donation $donation)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Donation',
                    ],
                    'unit_amount' => $donation->amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('donations.success', $donation),
            'cancel_url' => route('donations.cancel', $donation),
            'metadata' => [
                'donation_id' => $donation->id,
            ],
        ]);

        $donation->update([
            'transaction_id' => $session->id,
        ]);

        return redirect($session->url);
    }

    public function success(Donation $donation)
    {
        $donation->update(['payment_status' => 'completed']);
        return view('donations.success', compact('donation'));
    }

    public function cancel(Donation $donation)
    {
        $donation->update(['payment_status' => 'failed']);
        return view('donations.cancel', compact('donation'));
    }

    public function index()
    {
        $donations = Auth::guard('donor')->user()->donations()->latest()->paginate(15);
        return view('donations.index', compact('donations'));
    }

    public function show(Donation $donation)
    {
        $this->authorize('view', $donation);
        return view('donations.show', compact('donation'));
    }
}
