@php
 $page_breadcrumbs = [
     ["page" => "#", 'title' => "Guesty"],
     ["page" => "/reservations", 'title' => "Reservations"]
 ];
@endphp
@extends('layout.default')

@section('content')

@component('layout.components.datatable', [
    'name' => 'Reservations',
    'description' => 'Provided by Guesty API',
    'id' => 'reservations_datatable',
    'globalSearch' => true
])
@endcomponent

@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/reservations/reservations.js') }}" type="text/javascript"></script>
@endsection
