<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\DonationController;
use App\Livewire\PayWithStripe;
use Illuminate\Http\Request;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Models\Campaign;

Route::get('/', [SiteController::class, 'page'])->defaults('view', 'home')->name('home');
Route::get('/about', [SiteController::class, 'page'])->defaults('view', 'about.index')->name('about');
Route::get('/campaigns', [SiteController::class, 'campaigns'])->name('campaigns');
Route::get('/campaigns/{slug}', function ($slug) {
    
    /*
    $campa = Campaign::all();
    */
    $campaigns = collect(config('cms.campaign'));
    $campaign = $campaigns->where('name', $slug)->first() ?? abort('404', 100);
    return view('pages.campaigns.selected', compact('campaign'));
});;
Route::get('/contact', [SiteController::class, 'page'])->defaults('view', 'contact')->name('contact');
Route::get('/donate', [SiteController::class, 'page'])->defaults('view', 'donation.donate')->name('donate');

Route::get('/payment', function () {
    return view('pages.donate');
});
Route::get('/payment/success', function (Request $request) {
    $sessionId = $request->get('session_id');
    
    if ($sessionId) {
        \Stripe\Stripe::setApiKey(config('stripe.secret'));
        $session = \Stripe\Checkout\Session::retrieve($sessionId);
        
        // Mark payment as successful in your DB
        // Example: Payment::create([...])

        return view('pages.donation.success', compact('session'));
    }

    return redirect('/pay')->with('error', 'Payment failed.');
})->name('payment.success');

Route::get('/payment/cancel', function () {
    return view('pages.donation.cancel');
})->name('payment.cancel');

/*
Route::get('/payment-success', function () {
    return view('payment-success');
});

Route::get('/checkout', function (Request $request) {
    $stripePriceId = 'price_deluxe_album';
 
    $quantity = 1;
 
    return $request->user()->checkout([$stripePriceId => $quantity], [
        'success_url' => route('checkout-success'),
        'cancel_url' => route('checkout-cancel'),
    ]);
})->name('checkout');
 
Route::view('/checkout/success', 'checkout.success')->name('checkout-success');
Route::view('/checkout/cancel', 'checkout.cancel')->name('checkout-cancel');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
*/