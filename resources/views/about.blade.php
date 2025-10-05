@extends('layouts.app')

@section('title', 'About Page')

@section('content')
    <x-hero-section title="About Us" bg-image="assets/img/bg-hero.png" />
    @include('partials.about-main')
    @include('partials.team-about')
    @include('partials.about-showcase')
    @include('partials.faq')
@endsection