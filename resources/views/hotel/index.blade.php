@php
 $page_breadcrumbs = [
     ["page" => "#", 'title' => "Hotel Kassa Cash & Log"],
     ["page" => "/hotel", 'title' => "Hotel Kassa Cash & Log"]
 ];
@endphp
@extends('layout.default')

@section('content')

@component('layout.components.datatable', [
    'name' => 'Hotel Kassa Cash & Log',
    'description' => 'Forms',
    'id' => 'hotel_datatable',
    'globalSearch' => true
])
@endcomponent

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/hotel/hotel.js') }}" type="text/javascript"></script>
@endsection

@endsection
{{-- Scripts Section --}}

