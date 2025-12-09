<div>
    <div class="flex flex-col-reverse lg:flex-row h-full gap-4 p-6">
        <div class="relative w-full hidden lg:flex min-w-[60%] overflow-hidden h-full">
           <div class="absolute top-0 left-0 w-[40%] h-full">
                <div class="relative w-full h-full bg-cover bg-center" style="background-image: url({{asset('images/rubber-heart.jpg')}});">
                    <div class="absolute top-0 left-0 w-full h-full bg-amber-700/70"></div>
                </div>
            </div>
            <div class="relative top-20 -right-[20%] w-[70%] h-full pb-40">
                <div class="h-[40%] rounded-4xl overflow-hidden">
                    <img class="w-full h-full object-cover" src="{{ 'https://tplabs.co/wishon/wp-content/uploads/2022/12/fancy-image-4.webp' }}" alt="hero" class="w-full h-full object-cover" />
                </div>
            </div>
        </div>
        <div class="relative overflow-hidden rounded-xl">
            {{ $slot }}
        </div>
    </div>
</div>