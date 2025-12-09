@php
    $links= [
        ['name' => 'Home', 'url' => '#'],
        ['name' => 'About', 'url' => '#'],
        ['name' => 'Campaigns', 'url' => '#'],
        ['name' => 'Events', 'url' => '#'],
        ['name' => 'Contact', 'url' => '#'],
    ];
    $events = [
        ['name' => config('cms.campaign')[0]['title'], 'url' => '/campaigns/'.config('cms.campaign')[0]['name']],
        ['name' => config('cms.campaign')[1]['title'], 'url' => '/campaigns/'.config('cms.campaign')[1]['name']],
        ['name' => config('cms.campaign')[2]['title'], 'url' => '/campaigns/'.config('cms.campaign')[2]['name']],
    ];
@endphp
<div class="flex flex-col items-center justify-center border-t border-zinc-200 bg-zinc-800 px-4 py-24 text-sm text-zinc-500 dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-400"> 
    <div class="w-full max-w-[90rem] flex flex-col lg:flex-row gap-20">
        <div class="w-full lg:w-2/6 flex flex-col gap-10 ">
            <p class="text-zinc-50 text-lg">We focus on core needs: ensuring health, education, and protection from harm. We also provide crisis relief and advocate for children's rights.</p>
            <div class="w-full"><x-buttons.b1 /></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 w-full gap-10">
            <div>
                <x-header.title text="Links" class="text-zinc-50"/>

                <div class="flex flex-col gap-4 mt-4 px-2">
                    @foreach ($links as $link)
                        <a href="{{ $link['url'] }}" class="text-zinc-50 hover:text-zinc-50 hover:underline">{{ $link['name'] }}</a>
                    @endforeach
                </div>
            </div>

            <div>
                <x-header.title text="Non Profit" class="text-zinc-50"/>
                <div class="flex flex-col gap-4 mt-4 px-2">
                    @foreach ($events as $link)
                        <a href="{{ $link['url'] }}" class="text-zinc-50 hover:text-zinc-50 hover:underline">{{ $link['name'] }}</a>
                    @endforeach
                </div>
            </div>

            <div>
                <x-header.title text="Contact" class="text-zinc-50 mb-4"/>
                <div class="flex flex-col gap-4 px-2">
                    <div class="flex gap-3">
                        <span class="text-yellow-500"><i class="bi bi-phone-fill"></i></span> 
                        <span class="text-zinc-50">{{ config('cms.site-data.phone')[0]['label'] }}</span>
                    </div>
                    <div class="flex gap-3">
                        <span class="text-yellow-500"><i class="bi bi-envelope-at-fill"></i></span> 
                        <span class="text-zinc-50">{{ config('cms.site-data.email')[0] }}</span>
                    </div>

                    <div class="inline-flex flex-col gap-3">
                        <span class="text-yellow-500"><i class="bi bi-geo-alt-fill"></i></span>
                        <div class="text-zinc-400">
                            <span>{{ config('cms.site-data.address')[0] }}</span>
                            <span>{{ config('cms.site-data.address')[1] }}</span>,<br>
                            <span>{{ config('cms.site-data.address')[2] }}</span>,<br>
                            <span>{{ config('cms.site-data.address')[3] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row justify-between w-full max-w-[90rem] bg-zinc-900 rounded-xl overflow-hidden mt-20 py-10 px-4 lg:px-20">
        @php
            $developer = config('cms.site-data.developer');
        @endphp
        <div class="py-1 text-lg lg:text-lg">
            &copy; Copyright  {{date('Y')}} by 
            <a href="{{ $developer['link'] }}" class="text-yellow-500 hover:text-yellow-600 hover:underline"> 
                {{ $developer['company'] }} 
            </a> 
        </div>
        <div class="text-zinc-100 pt-4 text-md lg:text-sm">Charity No: 1143048;   Companies House reg:  07572271</div>
    </div>
</div>