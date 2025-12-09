@php

    $phone = config('cms.site-data.phone');
    $email = config('cms.site-data.email');
    $site_data = config('cms.site-data');
    $socials = config('cms.site-data.socials');
    $menu = [
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'About', 'url' => route('about')],
        ['label' => 'Campaigns', 'url' => route('campaigns')],
        // ['label' => 'Contact', 'url' => route('contact')],
    ]
@endphp

<div class="w-full bg-gray-100 sticky top-0 shadow z-10" x-data="menu">    
    <header class="hidden lg:flex w-full py-2 bg-zinc-800 text-gray-100">
        <div class="w-full max-w-[1440px] mx-auto flex items-center justify-between ">
            <div></div>
            <div class="flex items-center divide-x-2 divide-gray-300 gap-x-8 font-amiko">
                <a class="flex items-center pr-8 h-4">
                    <span class="nav-icon"><i class="bi bi-at"></i></span>
                    {{ $email[0] }}
                </a>
                <div>
                    <span class="nav-icon"><i class="bi bi-telephone-fill"></i></span> 
                    {{ $phone[0]['label'] }}
                </div>
            </div>
            <div class="flex items-center gap-6">
                @foreach ($socials as $social)
                    <a href="{{ $social['url'] }}" class="h-5">
                        {!! $social['icon'] !!}
                    </a>
                @endforeach        
            </div>
        </div>
    </header>
    <div class="hidden lg:flex justify-between max-w-[90rem] mx-auto w-full items-center px-2 mb-2">
        <div class="flex items-center mr-10">
            <div id="Logo" class="flex-shrink-0">
                <a href="#" class="flex flex-col items-center gap-4 bg-amber-700 rounded-b-xl p-6 w-64">
                    <span class="flex h-14 w-14 items-center justify-center rounded-lg ">
                        <img class="w-full h-full object-cover" src="{{ asset('images/logo.svg') }}" alt="logo">
                    </span>
                    <span class="text-white uppercase text-2xl">{{ config('app.name', 'Elpiscomm') }}</span>
                </a>
            </div>
        </div>

        <div class="flex items-center w-full justify-between">
            <div class="flex items-center gap-8 divide-x-2 divide-gray-300 font-aladin">                
                @foreach ($menu as $item)
                    <a href="{{ $item['url'] }}" class="flex items-center px-4 py-2 h-4  pr-10 text-2xl hover:text-orange-600 transition-all duration-300 ease-in-out">{{ $item['label'] }}</a>
                @endforeach            
            </div>
            <div>
                <a href="{{ route('donate') }}" class="px-8 py-4 bg-amber-500 rounded-md text-lg text-amber-100 hover:bg-amber-800 hover:text-white transition-all duration-300 ease-in-out font-amita">Donate Now</a>
            </div>
        </div>
    </div>
    <div class="flex lg:hidden justify-between w-full items-center px-2">
        <div class="flex items-center mr-10">
            <div id="Logo" class="flex">
                <a href="#" class="flex flex-col items-center gap-1 bg-amber-600  p-4 w-40">
                    <span class="icon flex h-8 w-8 items-center justify-center rounded-lg ">
                        <img class="w-full h-full object-cover" src="{{ asset('images/logo.svg') }}" alt="logo">
                    </span>
                    <span class="text text-white font-anaheim uppercase text-xl">{{ config('app.name', 'Elpiscomm') }}</span>
                </a>
            </div>
        </div>

        <div class="flex items-center">
            <button class="flex items-center px-4 py-2 h-4 text-2xl hover:text-orange-600 transition-all duration-300 ease-in-out" x-show="!open" @click="toggle">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </div>

    {{-- menu moblie --}}
    <div class="flex lg:hidden">
        <div class="flex flex-col fixed" x-show="open">
            <div class="fixed top-0 left-0 w-full h-screen bg-black/80 z-5"></div>
            <div class="fixed top-0 left-6 w-full h-screen bg-zinc-700  text-white z-6 py-14">
                <div class="absolute top-12 right-8">
                    <button class="flex items-center px-4 py-2 h-4 text-5xl hover:text-orange-600 transition-all duration-300 ease-in-out" @click="hide">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
                <div id="Logo2" class="my-6 px-6">
                    <a href="#" class="flex items-center gap-2  p-4">
                        <span class="icon flex h-14 w-14 items-center justify-center rounded-lg ">
                            <img class="w-full h-full object-cover" src="{{ asset('images/logo.svg') }}" alt="logo">
                        </span>
                        <span class="text text-white font-anaheim uppercase text-3xl font-bold">{{ config('app.name', 'Elpiscomm') }}</span>
                    </a>
                </div>
                <div class="flex flex-col gap-2 pl-10 pr-16">
                    @foreach ($menu as $item)
                        <a href="{{ $item['url'] }}" class="flex items-center px-2 py-4 text-xl hover:text-orange-600 transition-all duration-300 ease-in-out border-b border-gray-500 w-full" @click="hide">{{ $item['label'] }}</a>
                    @endforeach
                </div>

                <div class="absolute bottom-4 right-20 w-full justify-end flex gap-6">
                    @foreach ($socials as $item)
                        <a href="{{ $item['url'] }}" class="text-lg hover:text-orange-600 transition-all duration-300 ease-in-out">{!! $item['icon'] !!}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('menu', () => ({
            open: false,
 
            toggle() {
                this.open = ! this.open
            },

            hide() {
                this.open = false
            },
        }))
    })
</script>