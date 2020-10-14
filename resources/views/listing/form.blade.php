@php
 $action = empty($listing) ? 'Add' : 'Edit';

 $page_breadcrumbs = [
     ["page" => "/", 'title' => "Configurations"],
     ["page" => "/listing", 'title' => "Listing"],
     ["page" => "/listing/".strtolower($action), 'title' => $action]
 ];
@endphp
@extends('layout.default')

@section('content')

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title">{{$action}} Listing</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action=" @empty($listing){{ route('listing.create') }} @else {{route("listing.update", ['listing' => $listing->id]) }} @endempty">
            @csrf
            @if(!empty($listing)) <input type="hidden" name="id" value="{{$listing->id}}"> @endif
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input id="details" type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="details" value="{{ !empty($listing) ? $listing->details : old("details") }}" required autocomplete="details" autofocus placeholder="details">
                    <span class="form-text text-muted">Please enter the listing name</span>
                </div>
                <div class="form-group">
                    <label>Number</label>
                    <input id="value" type="number" step="1" class="form-control form-control-solid @error('name') is-invalid @enderror" name="value" value="{{ !empty($listing) ? $listing->value : old("value") }}" required autocomplete="value" placeholder="value">
                    <span class="form-text text-muted">Please enter the department number</span>
                </div>
                <div class="form-group">
                    <label>Min Price</label>
                    <div class="input-group input-group-solid">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-euro-sign icon-nm"></i>
                            </span>
                        </div>
                        <input type="number" class="form-control @error('minprice') is-invalid @enderror" value="{{ !empty($listing) ? $listing->minprice : old("minprice") }}" required autocomplete="minprice" placeholder="Min price" placeholder="Min price" name="minprice">
                    </div>
                    <span class="form-text text-muted">This value is used for rules validations</span>
                </div>
                <div class="form-group">
                    <label>Max Price</label>
                    <div class="input-group input-group-solid">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-euro-sign icon-nm"></i>
                            </span>
                        </div>
                        <input type="number" class="form-control @error('maxprice') is-invalid @enderror"  value="{{ !empty($listing) ? $listing->maxprice : old("maxprice") }}" required autocomplete="maxprice" placeholder="Max price" placeholder="Max price" name="maxprice">
                    </div>
                    <span class="form-text text-muted">This value is used for rules validations</span>
                </div>
                <div class="form-group">
                    <div class="checkbox-list">
                        <label class="checkbox">
                        <input @if(!empty($listing) && $listing->activeforrent ) checked @endif type="checkbox" name="activeforrent" />
                        <span></span>Is active</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tags</label>
                    @foreach ($listing->type as $type)
                        <span class="label label-light-dark label-inline mr-2">{{$type}}</span>
                    @endforeach
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a type="button" href="{{route('listing.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
