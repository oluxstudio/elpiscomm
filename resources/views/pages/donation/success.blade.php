<x-layouts.main title="Donation Successful">
    <div class="text-center py-12 my-6">
        <h1 class="text-5xl font-bold text-black text-anaheim">Payment Successful! 🎉</h1>
        <div>
            <p class="mt-4 text-xl">Thank you for your donation of £{{ number_format($session->amount_total / 100, 2) }}</p>
            <a href="/" class="mt-6 inline-block px-10 py-3 bg-blue-500 hover:bg-blue-900 text-abeezee text-white rounded-lg">Back to Home</a>
        </div>
    </div>
</x-layouts.main>
