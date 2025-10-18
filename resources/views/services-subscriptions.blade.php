@extends('layouts.app')

@section('title', __('Services & Subscriptions'))

@section('content')

    <x-hero-section pageId="services-subscriptions" />

    @php
        $services = [
            [
                'title' => __('Vacuuming'),
            ],
            [
                'title' => __('Cleaning windows'),
            ],
            [
                'title' => __('Cleaning compartments and trays'),
            ],
            [
                'title' => __('Dashboard cleaning'),
            ],
            [
                'title' => __('Plastic parts cleaning'),
            ],
            [
                'title' => __('Carpet mats cleaning'),
            ],
            [
                'title' => __('Steering wheel cleaning'),
            ],
            [
                'title' => __('Thorough wash rims'),
            ],
            [
                'title' => __('Thorough wash bumpers'),
            ],
            [
                'title' => __('Thorough wash windows'),
            ],
            [
                'title' => __('Removes dirt'),
            ],
            [
                'title' => __('Removes, deposits'),
            ],
            [
                'title' => __('Removes, insect residues'),
            ],
            [
                'title' => __('Perfume of choice'),
            ],
            [
                'title' => __('Thorough wash rims'),
            ],
        ];

        $images = [
            [
                'id' => '1',
                'image' => 'assets/img/service1.webp',
            ],
            [
                'id' => '2',
                'image' => 'assets/img/service2.webp',
            ],
            [
                'id' => '3',
                'image' => 'assets/img/service3.webp',
            ],
            [
                'id' => '4',
                'image' => 'assets/img/service4.webp',
            ],
            [
                'id' => '5',
                'image' => 'assets/img/service5.webp',
            ],
            [
                'id' => '6',
                'image' => 'assets/img/service6.webp',
            ],
        ]
    @endphp

    <section class="py-8 md:py-20 bg-[#ededed]">
        <div class="container">
            <div class="font-sf font-medium text-[24px] text-[var(--color-text)] text-center max-w-[840px] mx-auto">{{ __('From
                quick washes to premium detailing, choose the perfect package or subscribe for regular care and keep your
                car shining all year round.') }}</div>
        </div>
        <div class="flex flex-wrap gap-2 justify-center mt-8 md:mt-25">
            @foreach ($services as $service)
                <div
                    class="bg-white rounded-[8px] p-[30px] flex flex-col justify-center items-center gap-8 text-center w-[171px] h-[119px]">
                    <h3 class="text-[16px] font-medium text-[var(--color-text)] font-sf">{{  $service['title'] }}</h3>
                </div>
            @endforeach
        </div>
        <div class="flex flex-wrap gap-2 justify-center mt-2">
            @foreach ($images as $image)
                <div class="w-[171px] h-[119px]">
                    <img src="{{ asset($image['image']) }}" alt="{{ $image['id'] }}"
                        class="w-full h-full object-cover rounded-[8px]">
                </div>
            @endforeach
        </div>
    </section>

    @include('partials.pricing')
    @include('partials.showcase')


@endsection