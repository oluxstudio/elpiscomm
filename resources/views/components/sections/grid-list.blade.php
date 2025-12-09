<div class="elem-container bg-gray-200 px-6 lg:px-22 py-28 rounded-2xl">
    <div class="flex flex-col lg:flex-row w-full gap-8">
        <div class="w-full">
            {{ $slot }}
        </div>
        <div class="relative w-full min-w-40 lg:max-w-96 min-h-128 bg-cover bg-center rounded-2xl overflow-hidden max-h-128" style="background-image: url('images/warm-meal.jpg');">
            <div class="absolute top-0 left-0 w-full h-full bg-linear-to-b from-violet-500 to-slate-500/10"></div>
            <div class="absolute flex flex-col items-center w-full h-full p-10 text-5xl text-white">
                <span>Let’s Make a Difference in the Lives of Other People</span>
                <div class="absolute bottom-10 right-10"><x-buttons.b1 /></div>
            </div>
        </div>
    </div>
    
</div>