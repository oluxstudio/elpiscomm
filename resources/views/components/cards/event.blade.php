<div class="flex flex-col lg:flex-row gap-3 items-center bg-gray-50 p-6 rounded-2xl">
    <div class="w-24 h-24 rounded-full overflow-hidden"><img class="w-full h-full object-cover" src="{{asset($image??"")}}" alt=""></div>
    <div class="w-full flex flex-col gap-0">
        <div class="flex gap-5 items-center">
            <div class="flex items-stretch gap-1 text-yellow-500 text-lg font-bold">
                <span><i class="bi bi-calendar-minus-fill"></i></span> <span class="text-yellow-800 text-base"> {{ $date }} </span> 
            </div>
            <div class="flex items-stretch gap-1 text-yellow-500 text-lg font-bold">                    
                <span><i class="bi bi-clock-fill"></i></span> <span class="text-yellow-800 text-base"> {{ $time }} </span> 
            </div>
        </div>
        <div class="text-sm text-zinc-500 mt-1 text-center">{{ $location }}</div>
        <div class="text-xl font-bold text-black mt-2 font-aboreto">{{ $text }}</div>
    </div>
</div>