@php
    $crumbs = [
        ['url' => route('home'), 'name' => 'Home'],
        ['url' => route('campaigns'), 'name' => 'Campaigns'],
    ];
@endphp

<x-layouts.main title="Donation Successful">
    <x-heros.dynamic :title="$campaign['title']" :page="$campaign['name']" :breadcrumbs="$crumbs" image="{{asset('images/volunters.jpg')}}" />
    <div class="elem-container my-20">
       <div class="flex flex-col lg:flex-row gap-20">
            <div class="relative flex min-w-[45%] px-6">
                <div class="relative rounded-2xl overflow-hidden z-1">
                    <img class="w-full h-full object-cover" src="{{ asset($campaign['image']) }}" alt="campaign" />
                </div>
                <div class="absolute top-[10%] -right-2 w-60 h-[80%] bg-amber-500/80 z-0 rounded-2xl"></div>
            </div>
            <div class="w-full px-6">
                <x-header.h3 :header="$campaign['title']" />
                <div class="text-2xl font-normal my-4"> {!! $campaign['description'] !!} </div>
                <x-cards.goal raised="3000" goal="5000"/>
                <div class="flex flex-col gap-4 text-xl font-normal my-4"> {!! $campaign['content'] !!} </div>
                <div>
                    <livewire:make-donation :description="$campaign['title']" />
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
