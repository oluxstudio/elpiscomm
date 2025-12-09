<div class="flex flex-col lg:flex-row gap-10 overflow-hidden">
    <div class="lg:min-w-[28rem]">
        <div class="flex flex-col gap-4 px-6">
            <x-header.h2 header="Our Testimonials" />
            <x-header.h3 header="What They’re saying About us" />
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered by injected humour, or randomised words which don’t look even slightly believable.</p>
        </div>
    </div>
    <div class="w-full">
        <section class="embla embla-testimonial">
            <div class="embla__viewport">
              <div class="embla__container">
                <div class="embla__slide">
                  <x-cards.testimonial name="Remi Odebiri" job="CEO, Emmanuel Care Services" avatar="{{ asset('images/avatar2.jpg') }}" text="Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy data foster to collaborative thinking." rating="3S" />
                </div>
                <div class="embla__slide">
                  <x-cards.testimonial name="Sanmi Omogbeja" job="CEO, Unname" avatar="{{ asset('images/avatar3.jpg') }}" text="Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy data foster to collaborative thinking." rating="5" />

                </div>
                
                <div class="embla__slide"></div>

              </div>
            </div>
      
            <div class="embla__controls">
              <div class="embla__buttons">
                <button class="embla__button embla__button--prev" type="button">
                  <svg class="embla__button__svg" viewBox="0 0 532 532">
                    <path
                      fill="currentColor"
                      d="M355.66 11.354c13.793-13.805 36.208-13.805 50.001 0 13.785 13.804 13.785 36.238 0 50.034L201.22 266l204.442 204.61c13.785 13.805 13.785 36.239 0 50.044-13.793 13.796-36.208 13.796-50.002 0a5994246.277 5994246.277 0 0 0-229.332-229.454 35.065 35.065 0 0 1-10.326-25.126c0-9.2 3.393-18.26 10.326-25.2C172.192 194.973 332.731 34.31 355.66 11.354Z"
                    ></path>
                  </svg>
                </button>
      
                <button class="embla__button embla__button--next" type="button">
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
          </section>
    </div>
</div>

@push('styles')
    <style>
        .embla-testimonial .embla__controls{
            position: absolute;
            left: 10px;
            bottom: 5%
        }
    </style>    
@endpush
