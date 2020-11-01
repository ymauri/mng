@php
 $action = empty($role) ? 'Add' : 'Edit';

 $page_breadcrumbs = [
     ["page" => "/", 'title' => "Configurations"],
     ["page" => "/role", 'title' => "Role"],
     ["page" => "/role/".strtolower($action), 'title' => $action]
 ];
@endphp
@extends('layout.default')

@section('content')

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title">{{$action}} Role</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action=" @empty($role){{ route('role.create') }} @else {{route("role.update", ['role' => $role->id]) }} @endempty">
            @csrf
            @if(!empty($user)) <input type="hidden" name="id" value="{{$role->id}}"> @endif
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input id="name" type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" value="{{ !empty($role) ? $role->name : old("name") }}" required autocomplete="name" autofocus placeholder="Name">
                    <span class="form-text text-muted">Please enter the role name</span>
                </div>
                <div class="form-group">
                    <label>Permissions</label>
                    <div class="checkbox-list">
                        @foreach ($permissions as $permission)
                            <label class="checkbox">
                            <input @if(!empty($role) && in_array($permission->name, $currentPermissions) ) checked @endif type="checkbox" name="permissions[]" value="{{$permission->name}}" />
                            <span></span>{{__('base.'.$permission->name)}}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a type="button" href="{{route('role.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
