@extends('layouts.app')

@section('title', config('app.name') . ' - ' . __t('Trang Chủ', 'Home'))

@section('content')
    @include('homepage.sections._hero')

    {{-- Main Content Sections --}}
    @include('homepage.sections._statement-overview')
    @include('homepage.sections._scripture-foundation')
    @include('homepage.sections._dictionary-showcase')
    @include('homepage.sections._resources')
    @include('homepage.sections._blog-posts')
    @include('homepage.sections._newsletter')
@endsection

{{--@push('scripts')

@endpush--}}
