@php
 $page_breadcrumbs = [
     ["page" => "#", 'title' => "Configurations"],
     ["page" => "/source", 'title' => "Source"]
 ];
@endphp
@extends('layout.default')

@section('content')

@component('layout.components.datatable', [
    'name' => 'Source',
    'description' => 'Management',
    'button' => [
        'link' => route('source.add'),
        'name' => 'Add'
    ],
    'id' => 'source_datatable',
    'globalSearch' => true
])
@endcomponent

@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/source/source.js') }}" type="text/javascript"></script>
@endsection
