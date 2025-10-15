@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

    {{-- Hero Section --}}
    <x-hero-section pageId="home" />

    {{-- Home About --}}
    @include('partials.home-about')

    {{-- Working steps --}}
    @include('partials.working-steps')
    @include('partials.home-pricing')
    @include('partials.benefits')
    @include('partials.showcase')
    @include('partials.cta')
    @include('partials.testimonials')


@endsection