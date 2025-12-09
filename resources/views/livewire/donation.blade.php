<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Complete Your Payment</h2>

    <form wire:submit.prevent="pay" class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700">Amount (GBP £)</label>
            <input 
                type="number" 
                step="0.01" 
                wire:model="amount" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border"
                required 
                min="0.50"
            />
            @error('amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <input 
                type="text" 
                wire:model="description" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border"
            />
        </div>

        <div>
            <button 
                type="submit" 
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>Donate Now</span>
                <span wire:loading>Processing...</span>
            </button>
        </div>
    </form>

    <div class="mt-6 text-center text-xs text-gray-500">
        Secured by <strong>Stripe</strong> • No card details stored
    </div>
</div>