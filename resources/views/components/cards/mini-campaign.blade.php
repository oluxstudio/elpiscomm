<div class="rounded-xl overflow-hidden">
    <div class=" flex flex-col gap-8 py-6 px-2 lg:px-10">
        <div class="relative text-black text-3xl font-bold text-left">{{$title}}</div>
        <div class="relative text-black text-lg font-normal">{{ $description }}</div>
        <div><x-cards.goal :raised="$raised" :goal="$goal"/></div>
        <a class="block w-full bg-red-500 hover:bg-zinc-700 text-lg font-bold text-gray-100 hover:text-white  uppercase text-center py-6 rounded-lg" href="{{ $link}}">View Campaign</a>
    </div>
</div>