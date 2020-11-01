@php
 $page_breadcrumbs = [
     ["page" => "#", 'title' => "Guesty"],
     ["page" => "/blacklist", 'title' => "BlackList"]
 ];
@endphp
@extends('layout.default')

@section('content')

@component('layout.components.datatable', [
    'name' => 'BlackList',
    'description' => 'When this people made a reservation the system will generate an email.',
    'button' => [
        'link' => route('blacklist.add'),
        'name' => 'Add'
    ],
    'id' => 'blacklist_datatable',
    'globalSearch' => true
])
@endcomponent

@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/blacklist/blacklist.js') }}" type="text/javascript"></script>
@endsection
