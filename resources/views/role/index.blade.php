@php
 $page_breadcrumbs = [
     ["page" => "#", 'title' => "Configurations"],
     ["page" => "/role", 'title' => "Roles"]
 ];
@endphp
@extends('layout.default')

@section('content')

@component('layout.components.datatable', [
    'name' => 'Role',
    'description' => 'Management',
    'button' => [
        'link' => route('role.add'),
        'name' => 'Add'
    ],
    'id' => 'role_datatable',
    'globalSearch' => true
])
@endcomponent

@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/role/role.js') }}" type="text/javascript"></script>
@endsection
