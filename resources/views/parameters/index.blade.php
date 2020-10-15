@php
 $page_breadcrumbs = [
     ["page" => "#", 'title' => "Configurations"],
     ["page" => "/parameters", 'title' => "Parameters"]
 ];
@endphp
@extends('layout.default')

@section('content')

@component('layout.components.datatable', [
    'name' => 'Parameters',
    'description' => 'Global settings for customizing functionalities',
    'button' => [
        'link' => route('parameters.add'),
        'name' => 'Add'
    ],
    'id' => 'parameters_datatable',
    'globalSearch' => true
])
@endcomponent

@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/parameters/parameters.js') }}" type="text/javascript"></script>
@endsection
