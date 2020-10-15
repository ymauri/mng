@php
 $action = empty($parameters) ? 'Add' : 'Edit';

 $page_breadcrumbs = [
     ["page" => "/", 'title' => "Configurations"],
     ["page" => "/parameters", 'title' => "Parameter"],
     ["page" => "/parameters/".strtolower($action), 'title' => $action]
 ];
@endphp
@extends('layout.default')

@section('content')

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title">{{$action}} Parameter</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action=" @empty($parameters){{ route('parameters.create') }} @else {{route("parameters.update", ['parameters' => $parameters->id]) }} @endempty">
            @csrf
            @if(!empty($user)) <input type="hidden" name="id" value="{{$parameters->id}}"> @endif
            <div class="card-body">
                <div class="form-group">
                    <label>Description</label>
                    <input id="label" type="text" class="form-control form-control-solid @error('label') is-invalid @enderror" name="label" value="{{ !empty($parameters) ? $parameters->label : old("label") }}" required autocomplete="label" autofocus placeholder="Label">
                    <span class="form-text text-muted">Please enter the parameter description</span>
                </div>
                <div class="form-group">
                    <label>Variable name</label>
                    <input id="variable" type="text" class="form-control form-control-solid @error('variable') is-invalid @enderror" name="variable" value="{{ !empty($parameters) ? $parameters->variable : old("variable") }}" required autocomplete="variable" autofocus placeholder="Variable">
                    <span class="form-text text-muted">Please enter the key for access to this variable</span>
                </div>
                <div class="form-group">
                    <label>Value</label>
                    <input id="valstring" type="text" class="form-control form-control-solid @error('valstring') is-invalid @enderror" name="valstring" value="{{ !empty($parameters) ? $parameters->valstring : old("valstring") }}" required autocomplete="valstring" autofocus placeholder="Value">
                    <span class="form-text text-muted">Please enter the value for this parameter</span>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a type="button" href="{{route('parameters.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
