<div>
    <form wire:submit.prevent="pay" class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700">Amount (USD)</label>
            <input 
                type="number" 
                step="0.01" 
                wire:model="amount" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 border text-3xl"
                required 
                min="0.50"
            />
            @error('amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <input type="range" wire:model="amount" class="w-full border border-gray-200 rounded-md p-2"  min="0" max="500" step="5">
        </div>

        <button class="bg-red-500 hover:bg-red-700 text-white font-normal py-6 px-8 rounded-xl text-xl w-full uppercase cursor-pointer">            
            <span wire:loading.remove>Donate Now</span>
            {{-- <span wire:loading.remove>Donate Now £{{ number_format($amount, 2) }}</span> --}}
            <span wire:loading>Processing...</span>
        </button>
    <div>
</div>
