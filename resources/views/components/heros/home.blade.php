@php
    $slides = [
        ['title'=>'Raise funds for clean & healthy water', 'text'=>'Every human being deserves a fundamental right: access to clean and healthy water. Yet, for millions around the world and in our own communities, this basic necessity is a daily struggle.', 'image'=>asset('images/diverse-kids-playing.jpg'),],
        ['title'=>'Raise Funds for Clean & Healthy Food', 'text'=>"Access to clean, healthy food is not a privilege—it’s a foundation for life. Yet, countless families face barriers of cost, distance, and misinformation, leading to food insecurity and diet-related illness.", 'image'=> asset('images/people-with-notebooks.jpg'),],
        ['title'=>'Help poor kids after an unfortunate tragedy', 'text'=>"Imagine losing everything when you had so little to begin with. For a child in poverty, tragedy doesn't just mean loss.", 'image'=>asset('images/taking-donations.jpg'),],
    ];
@endphp
<div class="relative flex flex-col justify-center items-center w-full" x-data="slideshow">
    <div class="relative flex justify-center flex-col items-center w-full " @mouseenter="stopAutoPlay">
        <!-- Progress Bar Container -->
        <div class="absolute left-0 top-0 w-full h-1 bg-gray-300/30 z-10">
            <div class="h-full bg-amber-600 transition-all ease-linear" 
                 :style="{ width: progress + '%' }"></div>
        </div>
        <div id="ActiveSlide" 
            class="relative w-full min-h-[35rem] lg:min-h-[55rem]  bg-cover bg-center z-0 transition-all duration-700 ease-in-out"  
            :style="{ backgroundImage: `url(${activeSlide.image})` };"
            :key="activeSlide.image">
            <div class="overlay absolute top-0 left-0 w-full h-full bg-yellow-600/80 transition-opacity duration-700"></div>
            <div class="max-w-[90rem] mx-auto h-full">
                <div class="content transition-all duration-500 ease-out w-[85%] lg:w-1/3 ml-8 lg:ml-24">
                    <div class="name font-aladin tracking-[.20rem] text-5xl lg:text-6xl font-bold text-white" x-text="activeSlide.title"></div>
                    <div class="description" x-text="activeSlide.text"></div>
                    {{-- <button>See More</button> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="hidden lg:flex absolute gap-4 w-[45rem] overflow-hidden lg:right-5 p-4">        
        <template x-for="(slide, index) in thumbnails" :key=" index">
            <div
                class="slide-item bg-cover bg-center transition-all duration-500 ease-in-out transform hover:scale-105 hover:shadow-xl cursor-pointer"
                :class="{ 'animate-slide-out': isAnimating && index === 0 }"
                :style="{ backgroundImage: `url(${slide.image})` }"
                @click="select(slide, index)">
            </div>
        </template>
    </div>
    <div class="absolute flex lg:hidden gap-1 w-[70%] overflow-hidden bottom-6">
        <template x-for="(slide, index) in thumbnails" :key=" index">
            <div
                class="slide-item-mobile bg-cover bg-center transition-all duration-500 ease-in-out transform hover:scale-105 hover:shadow-xl cursor-pointer"
                :class="{ 'animate-slide-out': isAnimating && index === 0 }"
                :style="{ backgroundImage: `url(${slide.image})` }"
                @click="select(slide, index)">
            </div>
        </template>
    </div>
</div>



@push('styles')
    <style>
        .slide-item{ 
            @apply relative block w-32 h-36 bg-cover bg-center rounded-lg shadow-[0px_0px_2px_0px_rgba(0,0,0,0.03),0px_2px_4px_0px_rgba(0,0,0,0.06)];
        }
        
        @keyframes slideOut {
            0% {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
            100% {
                opacity: 0;
                transform: translateX(-100%) scale(0.8);
            }
        }
        
        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateX(100%) scale(0.8);
            }
            100% {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
        }
        
        .animate-slide-out {
            animation: slideOut 0.5s ease-in-out forwards;
        }
        
        .slide-item {
            animation: slideIn 0.5s ease-in-out;
        }
        
        #ActiveSlide {
            animation: fadeIn 0.7s ease-in-out;
        }
        
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.95);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>    
@endpush

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('slideshow', () => ({                
                init() {
                    const slides = @js($slides);
                    const thumbnails = @js($slides);
                    thumbnails.shift();
                    thumbnails.push(slides[0]);
                    this.activeSlide = slides[0];
                    this.thumbnails = thumbnails;
                    console.log({slides, thumbnails});
                    // this.startAutoPlay();
                },
                thumbnails: [],
                activeSlide: {},
                current: 0,
                isAnimating: false,
                progress: 0,
                autoPlayInterval: null,
                progressInterval: null,
                autoPlayDuration: 10000, // 3 seconds
                
                startAutoPlay() {
                    this.resetProgress();
                    
                    // Progress bar animation
                    this.progressInterval = setInterval(() => {
                        this.progress += (100 / (this.autoPlayDuration / 50));
                        if (this.progress >= 100) {
                            this.progress = 100;
                        }
                    }, 50);
                    
                    // Auto advance to next slide
                    this.autoPlayInterval = setInterval(() => {
                        this.next();
                    }, this.autoPlayDuration);
                },
                
                stopAutoPlay() {
                    if (this.autoPlayInterval) {
                        clearInterval(this.autoPlayInterval);
                    }
                    if (this.progressInterval) {
                        clearInterval(this.progressInterval);
                    }
                },
                
                resetProgress() {
                    this.progress = 0;
                    if (this.progressInterval) {
                        clearInterval(this.progressInterval);
                    }
                },
                
                next() {
                    if (this.isAnimating) return;
                    
                    this.isAnimating = true;
                    this.resetProgress();
                    
                    setTimeout(() => {
                        this.thumbnails.push(this.thumbnails.shift());
                        this.activeSlide = this.thumbnails[this.thumbnails.length - 1];
                        this.isAnimating = false;
                        // this.startAutoPlay();
                    }, 100);
                },
                
                select(slide, pos) {
                    if (this.isAnimating) return;
                    
                    // Stop auto play and restart
                    this.stopAutoPlay();
                    this.isAnimating = true;
                    this.resetProgress();
                    
                    // Wait for animation to complete before updating
                    // setTimeout(() => {
                        for (let index = 0; index <= pos; index++) {
                            this.thumbnails.push(this.thumbnails.shift());
                        }
                        this.activeSlide = slide;
                        this.isAnimating = false;
                        // this.startAutoPlay();
                    // }, 700);
                },
            }))
        })
    </script>    
@endpush


{{-- @php
    $slides = [
        ['title'=>'Title 1', 'text'=>'Renowned for its breathtaking Alpine scenery and precision in craftsmanship', 'image'=>'https://i.postimg.cc/05WWRYVx/Australia.jpg',],
        ['title'=>'Title 2', 'text'=>'Renowned for its breathtaking Alpine scenery and precision in craftsmanship', 'image'=> 'https://i.postimg.cc/DZfgR0s8/Finland.jpg',],
        ['title'=>'Title 3', 'text'=>'Renowned for its breathtaking Alpine scenery and precision in craftsmanship', 'image'=>'https://i.postimg.cc/g0W4qN2y/Switzerland.jpg',],
        ['title'=>'Title 4', 'text'=>'Renowned for its breathtaking Alpine scenery and precision in craftsmanship', 'image'=>'https://i.postimg.cc/kX2jn2HS/Iceland.jpg',],
        ['title'=>'Title 5', 'text'=>'Renowned for its breathtaking Alpine scenery and precision in craftsmanship', 'image'=>'https://i.postimg.cc/sDGJktB9/Ireland.jpg',],
    ];
@endphp
<div class="relative flex flex-col justify-center items-center w-full max-w-[1200px]" x-data="slideshow">
    <div class="relative flex justify-center flex-col items-center w-full ">
        <div class="absolute right-0 top-0 w-[8%] h-2 bg-amber-700/70 z-2"></div>
        <div id="ActiveSlide" 
            class="relative w-full min-h-128 bg-cover bg-center z-0 transition-all duration-700 ease-in-out"  
            :style="{ backgroundImage: `url(${activeSlide.image})` };"
            :key="activeSlide.image">
            <div class="overlay absolute top-0 left-0 w-full h-full bg-amber-800/30 transition-opacity duration-700"></div>
            <div class="content transition-all duration-500 ease-out">
                <div class="name" x-text="activeSlide.title">Switzerland</div>
                <div class="description" x-text="activeSlide.text">Renowned for its breathtaking Alpine scenery and precision in craftsmanship</div>
                <button>See More</button>
            </div>
        </div>
    </div>
    <div class="hidden lg:flex absolute gap-3 w-[50%] overflow-hidden lg:right-5">        
        <template x-for="(slide, index) in thumbnails" :key="slide.image + index">
            <div
                class="slide-item bg-cover bg-center transition-all duration-500 ease-in-out transform hover:scale-105 hover:shadow-xl cursor-pointer"
                :class="{ 'animate-slide-out': isAnimating && index === 0 }"
                :style="{ backgroundImage: `url(${slide.image})` }"
                @click="select(slide, index)">
            </div>
        </template>
    </div>
    <div class="absolute flex lg:hidden gap-3 w-[70%] overflow-hidden bottom-6">
        <div class="slide-item-mobile" style="background-image: url('https://i.postimg.cc/DZfgR0s8/Finland.jpg');"></div>
        <div class="slide-item-mobile" style="background: url('https://i.postimg.cc/kX2jn2HS/Iceland.jpg');"></div>
        <div class="slide-item-mobile" style="background-image: url('https://i.postimg.cc/kX2jn2HS/Iceland.jpg');"></div>
        <div class="slide-item-mobile" style="background-image: url('https://i.postimg.cc/DZfgR0s8/Finland.jpg');"></div>
        <div class="slide-item-mobile" style="background-image: url('https://i.postimg.cc/kX2jn2HS/Iceland.jpg');"></div>
    </div>
</div>



@push('styles')
    <style>
        .slide-item{ 
            @apply relative block w-32 h-36 bg-cover bg-center rounded-lg shadow-[0px_0px_2px_0px_rgba(0,0,0,0.03),0px_2px_4px_0px_rgba(0,0,0,0.06)];
        }
        
        @keyframes slideOut {
            0% {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
            100% {
                opacity: 0;
                transform: translateX(-100%) scale(0.8);
            }
        }
        
        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateX(100%) scale(0.8);
            }
            100% {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
        }
        
        .animate-slide-out {
            animation: slideOut 0.5s ease-in-out forwards;
        }
        
        .slide-item {
            animation: slideIn 0.5s ease-in-out;
        }
        
        #ActiveSlide {
            animation: fadeIn 0.7s ease-in-out;
        }
        
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.95);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>    
@endpush

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('slideshow', () => ({                
                init() {
                    const slides = @js($slides);
                    const thumbnails = @js($slides);
                    thumbnails.shift();
                    thumbnails.push(slides[0]);
                    this.activeSlide = slides[0];
                    this.thumbnails = thumbnails;
                },
                thumbnails: [],
                activeSlide: {},
                current: 0,
                isAnimating: false,
                next() {
                    console.log('next');
                },    
                select(slide, pos) {
                    if (this.isAnimating) return;
                    
                    this.isAnimating = true;
                    
                    // Wait for animation to complete before updating
                    setTimeout(() => {
                        for (let index = 0; index <= pos; index++) {
                            this.thumbnails.push(this.thumbnails.shift());
                        }
                        this.activeSlide = slide;
                        this.isAnimating = false;
                    }, 300);
                },
            }))
        })
    </script>    
@endpush --}}