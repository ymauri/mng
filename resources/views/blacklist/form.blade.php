@php
 $action = empty($blacklist) ? 'Add' : 'Edit';

 $page_breadcrumbs = [
     ["page" => "/", 'title' => "Configurations"],
     ["page" => "/blacklist", 'title' => "Blacklist"],
     ["page" => "/blacklist/".strtolower($action), 'title' => $action]
 ];
@endphp
@extends('layout.default')

@section('content')

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title">{{$action}} Blacklist</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action=" @empty($blacklist){{ route('blacklist.create') }} @else {{route("blacklist.update", ['blacklist' => $blacklist->id]) }} @endempty">
            @csrf
            @if(!empty($blacklist)) <input type="hidden" name="id" value="{{$blacklist->id}}"> @endif
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input id="name" type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" value="{{ !empty($blacklist) ? $blacklist->name : old("name") }}" required autocomplete="name" autofocus placeholder="name">
                    <span class="form-text text-muted">Please enter the full name</span>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input id="email" type="email" class="form-control form-control-solid @error('email') is-invalid @enderror" name="email" value="{{ !empty($blacklist) ? $blacklist->email : old("email") }}" required autocomplete="email" placeholder="email">
                    <span class="form-text text-muted">Please enter the email</span>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input id="phone" type="number" step="1" class="form-control form-control-solid @error('phone') is-invalid @enderror" name="phone" value="{{ !empty($blacklist) ? $blacklist->phone : old("phone") }}" autocomplete="phone" placeholder="phone">
                    <span class="form-text text-muted">Please enter the phone</span>
                </div>
                <div class="form-group">
                    <label>Checkin</label>
                    <input id="checkin" type="text" readonly data-date-format="yyyy-mm-dd" class="form-control form-control-solid @error('checkin') is-invalid @enderror" name="checkin" value="{{ !empty($blacklist) ? $blacklist->checkin : old("checkin") }}" required autocomplete="checkin" placeholder="checkin">
                    <span class="form-text text-muted">Please enter the date of the last reservation</span>
                </div>
                <div class="form-group">
                    <label>Listing</label>
                    <select name="listing_id" id="listing_id" class="form-control form-control-solid">
                        @foreach ($listings as $listing)
                            <option value="{{$listing->id}}" @if (!empty($blacklist) && $blacklist->listing_id == $listing->id ) selected @endif>{{$listing->value}}</option>
                        @endforeach
                    </select>
                    <span class="form-text text-muted">Select listing of the last reservation</span>
                </div>
                <div class="form-group">
                    <label>Details</label>
                    <textarea id="details" class="form-control form-control-solid @error('details') is-invalid @enderror" name="details" autocomplete="details" placeholder="Details" rows="5">{{ !empty($blacklist) ? $blacklist->details : old("details") }}</textarea>
                    <span class="form-text text-muted">Please describe the incident with this guest</span>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a type="button" href="{{route('staff.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        let arrows = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
        }
        $('#checkin').datepicker({
            todayHighlight: true,
            orientation: "bottom left",
            templates: arrows,
            maxDate: 0
        });
    })
</script>
@endsection

