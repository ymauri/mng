@php
 $page_breadcrumbs = [
     ["page" => "#", 'title' => "Guesty"],
     ["page" => "/rule", 'title' => "Rules"]
 ];
@endphp
@extends('layout.default')

@section('content')

@component('layout.components.datatable', [
    'name' => 'Rule',
    'description' => 'Management',
    'button' => [
        'link' => route('rule.add'),
        'name' => 'Add'
    ],
    'id' => 'role_datatable',
    'globalSearch' => false
])
@endcomponent

@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/rule/rule.js') }}" type="text/javascript"></script>
@endsection
