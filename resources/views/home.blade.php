@extends('layouts.app')

@section('title', config('app.name') . ' - ' . __t('Trang Chủ', 'Home'))

@section('content')
    @include('home_sections._hero')

    {{-- Main Content Sections --}}
    @include('home_sections._statement-overview')
    @include('home_sections._scripture-foundation')
    @include('home_sections._dictionary-showcase')
    @include('home_sections._resources')
    @include('home_sections._blog-posts')
    @include('home_sections._newsletter')

    @include('home_sections._modals')
@endsection

@push('scripts')
    @include('home_sections._scripts')
@endpush
