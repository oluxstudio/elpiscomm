@php
    $phone = config('cms.site-data.blade.phone');
    $email = config('cms.site-data.blade.email');
    $socials = config('cms.site-data.blade.socials');
@endphp

<header class="w-full py-2 bg-zinc-800 text-gray-100 ">
    <div class="max-w-[1440px] mx-auto flex items-center justify-between ">
        <div class="flex items-center divide-x-2 divide-gray-300 gap-x-4">
            <a class="flex items-center pr-4 h-4">{{ $email[0] }}</a>
            <div>{{ $phone[0]['label'] }}</div>
        </div>
        <div class="flex items-center gap-2">
            @foreach ($socials as $social)
                <a href="{{ $social['url'] }}" class="flex items-center gap-2">
                    <span class="flex h-8 w-8 bg-cyan-800 items-center justify-center rounded-md">    </span>
                </a>
            @endforeach        
        </div>
    </div>
</header>