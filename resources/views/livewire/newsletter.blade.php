<div class="w-full">
    <form wire:submit="join" class="flex flex-col lg:flex-row w-full">
        <div class="relative w-full rounded-md lg:rounded-l-xl lg:rounded-r-none overflow-hidden">
            <input type="text" class="w-full bg-white  text-xl px-4 lg:px-8 py-3 lg:py-5" wire:model="email" placeholder="Enter your email">
            @error('email') <span class="error-ab">{{ $message }}</span> @enderror 
        </div>
        <button type="submit" class="px-12 py-5 bg-yellow-500 text-white text-base rounded-md lg:rounded-l-none  lg:rounded-r-xl w-60 font-abeezee font-bold">Join Now</button>
    </form>
</div>
