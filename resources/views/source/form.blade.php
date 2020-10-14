@php
 $action = empty($source) ? 'Add' : 'Edit';

 $page_breadcrumbs = [
     ["page" => "/", 'title' => "Configurations"],
     ["page" => "/source", 'title' => "Source"],
     ["page" => "/source/".strtolower($action), 'title' => $action]
 ];
@endphp
@extends('layout.default')

@section('content')

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title">{{$action}} Source</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action=" @empty($source){{ route('source.create') }} @else {{route("source.update", ['source' => $source->id]) }} @endempty">
            @csrf
            @if(!empty($source)) <input type="hidden" name="id" value="{{$source->id}}"> @endif
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input id="details" type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="details" value="{{ !empty($source) ? $source->details : old("details") }}" required autocomplete="details" autofocus placeholder="details">
                    <span class="form-text text-muted">Please enter the source name</span>
                </div>
                <div class="form-group">
                    <label>Guesty Name</label>
                    <select name="guesty" id="guesty" class="form-control form-control-solid">
                        @foreach (App\Noms\Guesty::all() as $guesty)
                            <option value="{{$guesty}}" @if (!empty($source) && $guesty == $source->position ) selected @endif>{{$guesty}}</option>
                        @endforeach
                    </select>
                    <span class="form-text text-muted">Select the name that is writen in Guesty</span>
                </div>
                <div class="form-group">
                    <div class="checkbox-list">
                        <label class="checkbox">
                        <input @if(!empty($source) && $source->isactive ) checked @endif type="checkbox" name="isactive" />
                        <span></span>Is active</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox-list">
                        <label class="checkbox">
                        <input @if(!empty($source) && $source->extrafield ) checked @endif type="checkbox" name="extrafield" />
                        <span></span>Has extra field</label>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a type="button" href="{{route('staff.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
