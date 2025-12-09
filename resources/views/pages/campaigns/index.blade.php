@php
    $crumbs = [
        ['url' => route('home'), 'name' => 'Home'],
    ];
@endphp

<x-layouts.main title="Donation Successful">
    <x-heros.dynamic title="Our Campaigns" page="Campaigns" :breadcrumbs="$crumbs" image="{{asset('images/volunters.jpg')}}" />

    <div class="elem-container my-40 px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            @foreach ($campaigns as $item)                    
                <x-cards.campaign 
                    image="{{asset('images/help-poor-kids.webp')}}"
                    :title="$item['title']"
                    content="Pure heart virgin blood donation"
                    link="campaigns/{{$item['name']}}"
                    raised="300"
                    :goal="$item['goal']"
                />
            @endforeach
            {{-- <x-cards.campaign image="{{asset('images/children-education.webp')}}"/>
            <x-cards.campaign image="{{asset('images/volunteer-putting-finger.jpg')}}"/>
            <x-cards.campaign image="{{asset('images/warm-meal.jpg')}}"/>
            <x-cards.campaign image="{{asset('images/help-poor-kids.webp')}}"/>
            <x-cards.campaign image="{{asset('images/help-poor-kids.webp')}}"/> --}}
        </div>
    </div>
</x-layouts.main>
