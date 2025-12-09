<div>
    <div class="relative w-[35rem] min-h-[24rem]">
        <div class="absolute top-14 bottom-10 left-4 w-full bg-gray-50 rounded-2xl shadow z-0">
            <div class="absolute top-0 right-0 size-32 bg-gray-200 rounded-bl-[8rem]"></div>
        </div>

        <div class="relative flex items-center gap-4 pb-10 px-8 ">
            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-amber-800"><img class="w-full h-full object-cover" src="{{ asset($avatar) }}" alt="avatar" class="w-12 h-12 rounded-full"></div>
            <div class=" relative top-20 ml-4 overflow-hidden">
                <div class="flex gap-2 text-yellow-500 my-3 text-sm">
                    @for ($i = 0; $i < $rating; $i++)
                        <i class="bi bi-star-fill"></i>
                    @endfor
                </div>
                <div class="font-bold text-3xl">{{ $name }}</div>
                <div>{{ $job }}</div>
            </div>
            <div class="absolute top-16 right-1 text-[4rem] text-amber-800"><i class="bi bi-chat-quote-fill"></i></div>
        </div>
        <div class="relative text-zinc-600 px-14 py-14 z-2">{{$text}}</div>
    </div>
</div>