<?php

namespace App\Livewire;

use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Illuminate\Support\Facades\Auth;

class MakeDonation extends Component
{
    public $amount = 45; // Amount in GBP
    public $description = "";
    public $success_url;
    public $cancel_url;

    public function mount($description = null)
    {
        $this->description = $description;
        $this->success_url = route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}';
        $this->cancel_url = route('payment.cancel');
    }

    public function pay()
    {
        $this->validate([
            'amount' => 'required|numeric|min:0.50', // Stripe minimum
        ]);

        Stripe::setApiKey(config('stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name' => $this->description,
                    ],
                    'unit_amount' => $this->amount * 100, // Convert to cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $this->success_url,
            'cancel_url' => $this->cancel_url,
            'metadata' => [
                'user_id' => Auth::id() ?? 'guest',
            ],
        ]);

        return redirect($session->url, 303);
    }

    public function resetForm()
    {
    }

    
    public function render()
    {
        return view('livewire.make-donation');
    }
}
