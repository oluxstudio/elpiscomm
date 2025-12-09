@php
    $crumbs = [
        ['url' => route('home'), 'name' => 'Home'],
    ];
@endphp

<x-layouts.main title="Donation Successful">
    <x-heros.dynamic title="About us" page="About" :breadcrumbs="$crumbs" image="{{asset('images/volunters.jpg')}}" />
    <div>
        <div class="elem-container grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="bg-gray-200 px-6 lg:px-12 py-28 rounded-2xl">
                <p>Defining our Charity: Our Core Mission:  To provide essential stability,  educational resources,  and joyful opportunities to children (ages 0-16) facing challenges of impoverished homes and learning disabilities.  Helping them build a foundation for  a successful,  and fulfilling life. </p>
                <p>Our target Audience:  We serve two key demographics who often face overlapping difficulties:  1)  Children aged 0 to 16, living in impoverished homes. 2)  Children who have been identified as having learning disabilities,  regardless of their economic back ground.</p>
            </div>
            <div>What We Do: Our programme offers a multi faceted approach to address the fundamental needs of the children we serve.  We focus on providing tangible,  immediate support across critical areas:  1. Basic Necessities and Safety: We ensure every child has access to dignity and safety by providing food,  security through regular provisions and offering shelter and housing support to ensure a stable environment.                       2)  Education Readiness:  We equip students with essential tools they need to succeed in school.   This incurred supplying new school uniforms,  quality backpacks, and essential clothing items, removing economic barriers to participation and promoting self confidence.</div>
            <div>Social Enrichment and wellbeing:  We believe every child deserves moments of pure joy and inclusion.   We regularly host community events, seasonal parties, and constructive group activities designed to foster social skills  emotional growth, and a sense of belonging for all children , including those with learning disabilities.</div>
        </div>
    </div>
    <div class="text-center py-12 my-6">
        {{-- <h1 class="text-5xl font-bold text-black text-anaheim"> About us</h1> --}}
        <div class="max-w-[90rem] mx-auto w-full">
            <div class="flex flex-col lg:flex-row w-full gap-28">
                <div class="w-full text-left flex flex-col gap-12 px-6">
                    <x-header.h2 header="About us" />
                    <x-header.h3 header="Get to Know About Charity Organization" />
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing sed deiusmod tempor incididunt ut labore et dolore magna aliqua. Donec scelerisque dolor id nunc dictum.</p>
                    <div class="flex flex-col gap-4">
                        <x-sections.tracker.tr1 />
                        <x-sections.tracker.tr1 />
                    </div>
                    <div class="flex flex-col lg:flex-row gap-1 lg:gap-14">
                        <div class="mt-6">
                            <h3 class="text-xl font-normal text-anaheim">Call Us Now</h3>
                            <p class="text-2xl font-semibold"> {{ config('cms.site-data.phone')[0]['label'] }}</p>
                        </div>
                        <div class="mt-6">
                            <x-tiles.profile1 />

                        </div>
                    </div>
                </div>
                <div class="w-full lg:min-w-[45%] relative px-6">
                    <div class="absolute top-[10%] left-0 w-60 h-[80%] bg-amber-500/80 rounded-2xl z-0"></div>
                    <div class="relative block h-full w-full rounded-2xl overflow-hidden z-1"><img class="w-full h-full object-cover" src="{{ asset('images/about-image.webp') }}" alt="hero" /></div>
                </div>
            </div>
        </div>

    </div>
    
   <div class="sayings relative w-full bg-cover bg-center my-28 pt-20 py-20" style="background-image: url('images/world-map.webp');">
        <div class="absolute top-0 left-0 w-full h-full bg-gray-100/80 z-0 "></div>
        <div class="elem-container relative *:">
            <x-sections.carousel  />
        </div>
    </div>

    
   <div class="">
    <x-sections.parallex-wide /></div>
 <div> 
</x-layouts.main>
