@php
 $page_breadcrumbs = [
     ["page" => "#", 'title' => "Configurations"],
     ["page" => "/help", 'title' => "Hepl contents"]
 ];
@endphp
@extends('layout.default')

@section('content')

@component('layout.components.datatable', [
    'name' => 'Hepl contents',
    'description' => 'Management',
    'button' => [
        'link' => route('help.add'),
        'name' => 'Add'
    ],
    'id' => 'help_datatable',
    'globalSearch' => true
])
@endcomponent

@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/help/help.js') }}" type="text/javascript"></script>
@endsection
