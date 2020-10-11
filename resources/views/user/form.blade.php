@php
 $action = empty($user) ? 'Add' : 'Edit';

 $page_breadcrumbs = [
     ["page" => "/", 'title' => "Configurations"],
     ["page" => "/user", 'title' => "User"],
     ["page" => "/user/".strtolower($action), 'title' => $action]
 ];
@endphp
@extends('layout.default')

@section('content')

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title">{{$action}} User</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action=" @empty($user){{ route('user.create') }} @else {{route("user.update", ['user' => $user->id]) }} @endempty">
            @csrf
            @if(!empty($user)) <input type="hidden" name="id" value="{{$user->id}}"> @endif
            <div class="card-body">
                <div class="form-group">
                    <label>Full Name</label>
                    <input id="name" type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" value="{{ !empty($user) ? $user->name : old("name") }}" required autocomplete="name" autofocus placeholder="Full Name">
                    <span class="form-text text-muted">Please enter your full name</span>
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input id="email" type="email" class="form-control form-control-solid @error('email') is-invalid @enderror" name="email" value="{{ !empty($user) ? $user->email : old("email") }}" required autocomplete="email" placeholder="E-mail">
                    <span class="form-text text-muted">We'll never share your email with anyone else</span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control form-control-solid" placeholder="Password" name="password" @empty($user) required @endempty>
                    <span class="form-text text-muted">Password must have 8 characters at least</span>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control form-control-solid" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password" @empty($user) required @endempty>
                    <span class="form-text text-muted">Repeat the previous password</span>
                </div>
                @if (!empty($user) && $user->id == Auth::user()->id)
                    <input name="role" value="{{$user->roles()->first()->id}}" type="hidden">
                @else
                    <div class="form-group">
                        <label>Role</label>
                        <select name='role' id="role" class="form-control form-control-solid">
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}" @if (!empty($user) && $role->id == $user->roles()->first()->id ) selected @endif>{{$role->name}}</option>
                            @endforeach
                        </select>
                        <span class="form-text text-muted">Select a role for this user</span>
                    </div>
                @endif
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a type="button" href="{{route('user.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
