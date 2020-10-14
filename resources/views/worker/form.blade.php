@php
 $action = empty($worker) ? 'Add' : 'Edit';

 $page_breadcrumbs = [
     ["page" => "/", 'title' => "Configurations"],
     ["page" => "/staff", 'title' => "Staff"],
     ["page" => "/staff/".strtolower($action), 'title' => $action]
 ];
@endphp
@extends('layout.default')

@section('content')

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title">{{$action}} Staff</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action=" @empty($worker){{ route('staff.create') }} @else {{route("staff.update", ['worker' => $worker->id]) }} @endempty">
            @csrf
            @if(!empty($worker)) <input type="hidden" name="id" value="{{$worker->id}}"> @endif
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input id="name" type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" value="{{ !empty($worker) ? $worker->name : old("name") }}" required autocomplete="name" autofocus placeholder="Name">
                    <span class="form-text text-muted">Please enter the a name</span>
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <select name='position' id="position" class="form-control form-control-solid">
                        @foreach (App\Noms\Position::all() as $position)
                            <option value="{{$position}}" @if (!empty($worker) && $position == $worker->position ) selected @endif>{{$position}}</option>
                        @endforeach
                    </select>
                    <span class="form-text text-muted">Select a postion for this staff member</span>
                </div>
                <div class="form-group">
                    <div class="checkbox-list">
                        <label class="checkbox">
                        <input @if(!empty($worker) && $worker->isactive ) checked @endif type="checkbox" name="isactive" />
                        <span></span>Is active</label>
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
