<section class="cta relative">
    <div class=" ">
        {{-- <div class="container"> --}}
            <div class="flex flex-wrap">
                <div
                    class="w-full lg:w-[60%] bg-[var(--color-black)] rounded-tr-[20px] rounded-br-[20px] py-10 px-4 md:pr-10 lg:pl-6 xl:pl-[calc((100vw-1200px)/2)] flex flex-col justify-center">
                    <div class="lg:pr-25">
                        <h2
                            class="text-white text-[28px] md:text-[34px] font-black leading-[1.2] md:leading-[42px] tracking-[0.03px]">
                            {{ __('Make your car sparkle today!') }}</h2>
                        <p class="text-white text-lg leading-[1.3] mt-4 mb-[26px]">{{ __('Book your wash and detailing in minutes.') }} {{ __('We’ll come to you and leave your ride spotless inside and out.') }}</p>
                        <div class="inline-flex">
                            <a href="{{ route('book-now', ['locale' => app()->getLocale()]) }}" class="btn-brand"><span>{{ __('Book Now') }}</span>
                                <svg width="25" height="11" viewBox="0 0 25 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24 5.5H1M24 5.5L19.5 1M24 5.5L19.5 10" stroke="white" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 lg:w-[13%]">
                    <img src="{{ asset('assets/img/cta-image1.png') }}" alt="CTA Image 1"
                        class="w-full h-full object-cover rounded-[24px]">
                </div>
                <div class="w-1/2 lg:w-[27%]">
                    <img src="{{ asset('assets/img/cta-image2.png') }}" alt="CTA Image 2"
                        class="w-full h-full object-cover rounded-[24px]">
                </div>
            </div>

            {{--
        </div> --}}
    </div>
</section>