@extends('layouts.app')

@section('title', __('About Page'))

@section('content')
    <x-hero-section pageId="about" />
    @include('partials.about-main')
    @include('partials.team-about')
    @include('partials.about-showcase')
    @include('partials.faq')
@endsection