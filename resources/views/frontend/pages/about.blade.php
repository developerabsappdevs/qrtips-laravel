@extends('frontend.layouts.master')

@push("css")

@endpush

@section('content')

@foreach ($page_section->sections ?? [] as $item)

    @if ( $item->section->key == 'banner-section')
        @include('frontend.sections.banner')
    @elseif($item->section->key == 'how-its-work-section')
        @include('frontend.sections.how-its-work')
    @elseif($item->section->key == 'download-app-section')
        @include('frontend.sections.download-app')
    @elseif($item->section->key == 'security-section')
        @include('frontend.sections.security')
    @elseif($item->section->key == 'statistic-section')
        @include('frontend.sections.statistics')
    @endif
    
@endforeach

@endsection
