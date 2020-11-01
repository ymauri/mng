@php
 $page_breadcrumbs = [
     ["page" => "#", 'title' => "Guesty"],
     ["page" => "/pricing", 'title' => "Pricing"]
 ];
@endphp
@extends('layout.default')

@section('content')
    <div class="col-12 card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label"> Update prices <small>Set a filter and update prices on Guesty</small></h3>
            </div>
        </div>
        <div class="card-body">
            <form id="filter-data">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <label>Filter by date</label>
                            <input id="daterange" type="text" data-date-format="yyyy-mm-dd" class="form-control form-control-solid " name="daterange" placeholder="Date range" required>
                            <span class="form-text text-muted">Please select a date range for filter Guesty data</span>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="form-group">
                            <label>Listings</label>
                            <select name="listings[]" id="listings" class="form-control form-control-solid select2" multiple="multiple">
                                @foreach ($listings as $listing)
                                    <option value="{{$listing->idguesty}}" >{{$listing->value}}
                                        @foreach ($listing->type as $type)
                                            @if($type== "Apartment" || $type == "Studio")
                                                <strong class="text-danger">({{$type}})</strong>
                                            @endif
                                        @endforeach
                                    </option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted">Please select the listings for filtering Guesty data</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            {{-- <label class="col-4 col-form-label">Filter by day of the week</label> --}}
                            <div class="col-12 col-form-label">
                                <label class="col-form-label">Filter by day of the week</label>
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="weekdays[]" value="1"/>
                                        <span></span>
                                        Maandag
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="weekdays[]" value="2"/>
                                        <span></span>
                                        Dinsdag
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="weekdays[]" value="3"/>
                                        <span></span>
                                        Woensdag
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="weekdays[]" value="4"/>
                                        <span></span>
                                        Donderdag
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="weekdays[]" value="5"/>
                                        <span></span>
                                        Vrijdag
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="weekdays[]" value="6"/>
                                        <span></span>
                                        Zaterdag
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="weekdays[]" value="7"/>
                                        <span></span>
                                            Zondag
                                    </label>
                                </div>
                                <span class="form-text text-muted">Please select one or more days of the week</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-right ">
            <button type="button" class="btn btn-primary" id='btn-filter'>Filter</button>
        </div>
    </div>

    <div class="col-12 card card-custom mt-7">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label"> Listings info <small>This secion contains the data came from Guesty </small></h3>
            </div>
            <div class="card-toolbar">
                <button class="btn btn-light-primary font-weight-bold btn-update" disabled>Update</button>
            </div>
        </div>
        <div class="card-body">
            <form id="price-data">
                @include('pricing.no-info')
            </form>
        </div>
        <div class="card-footer text-right ">
            <button class="btn btn-light-primary font-weight-bold btn-update" disabled>Update</button>
        </div>
    </div>
@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pricing/pricing.js') }}" type="text/javascript"></script>
@endsection
