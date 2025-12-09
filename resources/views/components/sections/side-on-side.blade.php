@php
    $fetched_campaigns = config('cms.campaign');
    $campaigns = collect($fetched_campaigns)->chunk(2);
@endphp
<div class="flex flex-col gap-4 elem-container">
    <x-header.h2 header="Welcome to Charity Platform" />
    <x-header.h3 header="Featured Campaigns" />
    <div class="relative flex flex-col lg:flex-row gap-0 w-full">
        
        <div class="embla-fade embla max-h-[50rem]">
            <div class="embla__viewport">
                <div class="embla__container">
                    @foreach ($campaigns[0] as $item)
                        <div class="embla__slide">
                            <x-cards.campaign-2col image="{{asset($item['image'])}}">
                                <x-cards.mini-campaign image="{{asset('images/help-poor-kids.webp')}}" :title="$item['title']" :description="$item['description']" :raised="20,000" :goal="50000" link="#"/>
                            </x-cards.campaign-2col>
                        </div>
                    @endforeach
                    
                </div>
            </div>
            <div class="embla__controls">
                <div class="embla__buttons">
                    <button class="embla__button embla__button--prev" type="button" disabled="">
                        <svg class="embla__button__svg" viewBox="0 0 532 532">
                            <path
                            fill="currentColor"
                            d="M355.66 11.354c13.793-13.805 36.208-13.805 50.001 0 13.785 13.804 13.785 36.238 0 50.034L201.22 266l204.442 204.61c13.785 13.805 13.785 36.239 0 50.044-13.793 13.796-36.208 13.796-50.002 0a5994246.277 5994246.277 0 0 0-229.332-229.454 35.065 35.065 0 0 1-10.326-25.126c0-9.2 3.393-18.26 10.326-25.2C172.192 194.973 332.731 34.31 355.66 11.354Z"
                            ></path>
                        </svg>
                    </button>
                    <button  class="embla__button embla__button--next"  type="button"  disabled="">
                        <svg class="embla__button__svg" viewBox="0 0 532 532">
                            <path
                            fill="currentColor"
                            d="M176.34 520.646c-13.793 13.805-36.208 13.805-50.001 0-13.785-13.804-13.785-36.238 0-50.034L330.78 266 126.34 61.391c-13.785-13.805-13.785-36.239 0-50.044 13.793-13.796 36.208-13.796 50.002 0 22.928 22.947 206.395 206.507 229.332 229.454a35.065 35.065 0 0 1 10.326 25.126c0 9.2-3.393 18.26-10.326 25.2-45.865 45.901-206.404 206.564-229.332 229.52Z"
                            ></path>
                        </svg>
                    </button>
                </div>
              
                <div class="embla__dots"></div>
            </div>
        </div>
    {{-- <div class="embla">
        <div class="embla__viewport">
          <div class="embla__container">
            <div class="embla__slide">
                <div class="relative w-full lg:w-[60%] bg-amber-700/30 min-h-[40rem] rounded-2xl overflow-hidden"> 
                    <div class="absolute top-0 left-0 w-full h-full bg-cover bg-center" style="background-image:url({{asset('images/refugee.jpg')}})">
                        
                    </div>
                </div>
                <div class="w-full lg:w-[55%] bg-gray-50 min-h-[40rem] rounded-2xl lg:absolute lg:top-[15%] lg:right-[0%]">
                    <div class="p-10"></div>
                </div>
            </div>
          </div>
        </div> --}}
    </div>

</div>

@push('styles')
    <style>
        .embla-fade .embla__controls{
            position: absolute;
            right: 10px;
            top: -20%;
        }
    </style>
@endpush
    