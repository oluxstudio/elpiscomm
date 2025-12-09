<x-layouts.main title="Home">
   @push('meta')
   <meta name="description" content="Home page">
   @endpush 
   <div class="relative flex justify-center">
      <x-heros.home />
   </div> 
  
   <div class="max-w-[90rem] mx-auto w-full">
      <x-sections.col2>
         <div class="flex flex-col gap-6">
            <x-header.h2 header="Welcome to Charity Platform" />
            <h3 class=" font-aladin tracking-[.20rem] text-2xl lg:text-6xl font-bold capitalize">The Best Non-Profit Organization </h3>
            <div class="font-aboreto font-bold text-[1.2rem] text-red-500">
               We focus on core needs: ensuring health, education, and protection from harm. We also provide crisis relief and advocate for children's rights. Our works to break the cycle of poverty by ensuring children are healthy and nourished enough to learn and thrive.
            </div>
            <p>Defining our Charity: Our Core Mission:  To provide essential stability,  educational resources,  and joyful opportunities to children (ages 0-16) facing challenges of impoverished homes and learning disabilities.  Helping them build a foundation for  a successful,  and fulfilling life. </p>
            <x-sections.tracker.tr1 />
            <x-tiles.profile1 />
         </div>
      </x-sections.col2>
   </div>

   <div class="my-20 px-6">
      <x-sections.side-on-side />
   </div>

   <div class="relative w-full bg-cover bg-center my-28 pt-20 py-20 px-6" style="background-image: url('images/world-map.webp');">
      <div class="absolute top-0 left-0 w-full h-full bg-gray-100/80 z-0"></div>
      <div class="elem-container relative z-1">
         <x-sections.carousel  />
      </div>
   </div>
   <div class="">
      <x-sections.parallex-wide />
   </div>
   <div>
      <x-sections.grid-list>
         <x-header.h2 header="Upcoming Events" />
         <div class="my-10"><x-header.h3 header="Upcoming Events" /></div>
         <h4 class="font-bold my-4 text-3xl">Events</h4>
         <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <x-cards.event image="{{asset('images/help-poor-kids.webp')}}" date="Jan 22, 2026" time="10:00 AM" location="12 carol street, thamesmead, London" text="Education for African" />
            <x-cards.event image="{{asset('images/help-poor-kids.webp')}}" date="Feb 2, 2026" time="10:00 AM" location="12 carol street, thamesmead, London" text="Pure heart virgin blood donation" />
            
         </div>
      </x-sections.grid-list>
   </div>
   <div class="my-20 px-6">
      <x-sections.solid />
   </div>
</x-layouts.main>