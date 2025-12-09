<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Stripe\Stripe;
use Stripe\PaymentIntent;
// use App\Models\Payment;
// use App\Models\Order;
use Illuminate\Support\Str;

use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;

class Donation extends Component
{
    public $amount = 20.99; // Amount in GBP Pounds
    public $description = "General Donation";
    public $success_url;
    public $cancel_url;

    public function mount()
    {
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


    /*
    protected function createPaymentIntent()
    {
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $this->amount,
                'currency' => $this->currency,
                'metadata' => [
                    'customer_name' => $this->firstName . ' ' . $this->lastName,
                    'customer_email' => $this->email,
                ],
            ]);
            
            $this->clientSecret = $paymentIntent->client_secret;
            $this->paymentIntentId = $paymentIntent->id;
            
        } catch (\Exception $e) {
            $this->stripeError = $e->getMessage();
        }
    }
    
    public function updated($propertyName)
    {
        dd($propertyName);
        $this->validateOnly($propertyName);
    }
    
    public function processPayment()
    {
        $this->validate();
        
        // Store order details in session or database
        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'customer_first_name' => $this->firstName,
            'customer_last_name' => $this->lastName,
            'customer_email' => $this->email,
            'customer_phone' => $this->phone,
            'amount' => $this->amount / 100, // Convert cents to dollars
            'currency' => $this->currency,
            'status' => 'pending',
        ]);
        
        session(['current_order_id' => $order->id]);
        
        // Payment will be confirmed via webhook
        $this->paymentStatus = 'processing';
        
        // You can emit an event to show success message
        $this->dispatchBrowserEvent('payment-processing');
    }
    
    public function handleStripeError($error)
    {
        $this->stripeError = $error['message'];
        $this->paymentStatus = 'failed';
    }
    
    public function handlePaymentSuccess($paymentIntent)
    {
        $orderId = session('current_order_id');
        
        if ($orderId) {
            Order::where('id', $orderId)->update([
                'status' => 'completed',
                'stripe_payment_id' => $paymentIntent['id'],
            ]);
            
            // Create payment record
            Payment::create([
                'order_id' => $orderId,
                'stripe_payment_id' => $paymentIntent['id'],
                'amount' => $paymentIntent['amount'] / 100,
                'currency' => $paymentIntent['currency'],
                'status' => $paymentIntent['status'],
                'customer_email' => $paymentIntent['metadata']['customer_email'] ?? $this->email,
            ]);
            
            $this->paymentStatus = 'success';
            session()->forget('current_order_id');
            
            $this->dispatchBrowserEvent('payment-successful');
        }
    }
    */
    public function resetForm()
    {
        $this->resetExcept(['clientSecret', 'paymentIntentId']);
        $this->paymentStatus = 'pending';
        $this->createPaymentIntent();
    }

    
    public function render()
    {
        // return view('livewire.donation', [
        //     'stripeKey' => config('services.stripe.key'),
        // ]);
        return view('livewire.donation');
    }
}
