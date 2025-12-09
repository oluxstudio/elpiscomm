<div class="flex flex-col-reverse lg:flex-row h-full gap-4 p-6">
    <div class="hidden lg:block relative w-full lg:w-[60%] bg-amber-700/30 min-h-[40rem] rounded-2xl overflow-hidden"> 
        <div class="absolute top-0 left-0 w-full h-full bg-cover bg-center" style="background-image:url({{ $image }})">            
        </div>
    </div>
    <div class="w-full lg:w-[50%] bg-gray-50 min-h-[24rem] rounded-2xl lg:absolute lg:top-[10%] lg:right-[2%] shadow">
        <div class="p-2 lg:p-16">
            {{ $slot }}
        </div>
    </div>
</div>