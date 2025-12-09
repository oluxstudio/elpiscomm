<div class="border border-gray-200 rounded-xl overflow-hidden">
    <div class="relative flex flex-col"> 
        <div class="relative w-full min-h-[20rem] bg-cover bg-center" style="background-image:url({{asset($image)}})">            
        </div>
        <div class=" flex flex-col gap-8 p-2 lg:p-10">
            <div class="relative text-black text-3xl font-bold text-center">{{$title}}</div>
            <div class="relative text-black text-lg font-normal">{{ $content}}</div>
            <div><x-cards.goal :raised="$raised" :goal="$goal"/></div>
            <a class="block w-full bg-gray-200 hover:bg-zinc-700 text-lg font-bold text-gray-700 hover:text-white  uppercase text-center py-4 rounded-lg" href="{{ $link}}">View Campaign</a>
        </div>
    </div>
    
</div>