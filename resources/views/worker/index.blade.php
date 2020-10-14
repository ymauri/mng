@php
 $page_breadcrumbs = [
     ["page" => "#", 'title' => "Configurations"],
     ["page" => "/staff", 'title' => "Staff"]
 ];
@endphp
@extends('layout.default')

@section('content')

@component('layout.components.datatable', [
    'name' => 'Staff',
    'description' => 'Management',
    'button' => [
        'link' => route('staff.add'),
        'name' => 'Add'
    ],
    'id' => 'worker_datatable',
    'globalSearch' => true
])
@endcomponent

@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/worker/worker.js') }}" type="text/javascript"></script>
@endsection
