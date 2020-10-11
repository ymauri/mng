@php
 $page_breadcrumbs = [
     ["page" => "#", 'title' => "Configurations"],
     ["page" => "/user", 'title' => "Users"]
 ];
@endphp
@extends('layout.default')

@section('content')

@component('layout.components.datatable', [
    'name' => 'Users',
    'description' => 'Management',
    'button' => [
        'link' => route('user.add'),
        'name' => 'Add'
    ],
    'id' => 'user_datatable',
    'globalSearch' => true
])
@endcomponent

@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/user/user.js') }}" type="text/javascript"></script>
@endsection
