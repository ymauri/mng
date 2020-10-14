@php
 $action = empty($help) ? 'Add' : 'Edit';

 $page_breadcrumbs = [
     ["page" => "/", 'title' => "Configurations"],
     ["page" => "/help", 'title' => "Help contents"],
     ["page" => "/help/".strtolower($action), 'title' => $action]
 ];
@endphp
@extends('layout.default')

@section('content')

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title">{{$action}} Help content</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action=" @empty($help){{ route('help.create') }} @else {{route("help.update", ['help' => $help->id]) }} @endempty">
            @csrf
            @if(!empty($help)) <input type="hidden" name="id" value="{{$help->id}}"> @endif
            <div class="card-body">
                <div class="form-group">
                    <label>Form</label>
                    <select name='form' id="field" class="form-control form-control-solid">
                        @foreach (config('forms.active') as $form => $name)
                            <option value="{{$form}}" @if (!empty($help) && $form == $help->form ) selected @endif>{{$name}}</option>
                        @endforeach
                    </select>
                    <span class="form-text text-muted">This is the form wich will show this help content</span>
                </div>
                <div class="form-group">
                    <label>Field</label>
                    <select name='field' id="field" class="form-control form-control-solid">
                        @foreach ($fields as $item)
                            <option value="{{$item}}" @if (!empty($help) && $item == $help->field ) selected @endif>{{__('base.'.$item)}}</option>
                        @endforeach
                    </select>
                    <span class="form-text text-muted">This is the field corresponding to the help content</span>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea id="content" class="form-control form-control-solid @error('content') is-invalid @enderror" name="content" required autocomplete="content" placeholder="Content">{{ !empty($help) ? $help->content : old("content") }}</textarea>
                    <span class="form-text text-muted">Write the help content</span>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a type="button" href="{{route('help.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
