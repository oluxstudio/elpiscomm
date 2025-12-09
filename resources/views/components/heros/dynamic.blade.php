
<div class="relative flex flex-col justify-center items-center w-full">
    <div class="relative flex justify-center flex-col items-center w-full">
        <div class="relative w-full h-[10rem] lg:h-[30rem] bg-cover bg-center z-0 transition-all duration-700 ease-in-out" style="background-image: url({{ asset($image) }});">

            <div class="overlay absolute top-0 left-0 w-full h-full bg-linear-to-r from-orange-500/60 to-blue-500 transition-opacity duration-700"></div>

            <div class="max-w-[90rem] mx-auto h-full px-6">
                <div class="content transition-all duration-500 ease-out mt-1 lg:mt-6">
                    <div class="flex gap-4 text-lg my-3 font-amiko">
                        @foreach ($breadcrumbs as $item)
                            <a class="font-bold" href="{{$item['url']}}">{{$item['name']}}</a>
                            <span>/</span>
                        @endforeach
                        <div class="font-normal">{{$page}}</div>
                    </div>
                    <div class="text-3xl lg:text-8xl font-bold text-white font-akronim">{{$title}}</div>
                </div>
            </div>
        </div>
    </div>
</div>

