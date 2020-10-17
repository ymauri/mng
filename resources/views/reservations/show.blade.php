@php
 $page_breadcrumbs = [
     ["page" => "/", 'title' => "Configurations"],
     ["page" => "/reservations", 'title' => "Reservations"],
     ["page" => "#", 'title' => 'Show']
 ];
@endphp
@extends('layout.default')

@section('content')
<div class="row">
    <div class="col-lg-8 col-12">
        <div class=" card card-custom bgi-no-repeat gutter-b justify-content-between flex-wrap" style="background-color: #6dd1ad; background-position: calc(100% + 1rem) bottom; background-size: 20% auto; background-image: url({{ asset("media/svg/humans/custom-3.svg")}}); height:175px;">
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center">
                <div class="py-2">
                <h3 class="text-white font-weight-bolder mb-3">{{ $checkin->listing->details }}</h3>
                    <p class="text-white font-size-lg"><i class="fa icon-nm fas fa-house-user text-white"></i> &nbsp;{{ $checkin->name }}
                    <br><i class="fa icon-nm far fa-envelope text-white"></i>&nbsp; <a href="mailto:{{ $checkin->email }}">{{ $checkin->email }}</a>
                    <br><i class="fa icon-nm far fa-phone text-white"></i>&nbsp; {{ $checkin->phone }}
                </div>
            </div>
            <!--end::Body-->
        </div>
    </div>

    <div class="col-12 col-lg-4 ">
        <div class="card card-custom bgi-no-repeat gutter-b justify-content-between flex-wrap" style="background-color: #93c8f9;  background-position: calc(100% + 1rem) bottom; background-size: 40% auto; background-image: url({{ asset("media/svg/humans/custom-1.svg")}});  height:175px;">
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center">
                <div class="py-2">
                    <h3 class="text-white font-weight-bolder mb-3">{{ Str::ucfirst($checkin->status) }}</h3>
                    <p class="text-white font-size-lg"><i class="fa icon-nm far fa-calendar-check text-white"></i> &nbsp;{{ $checkin->time }}
                    @if(!empty($checkin->checkout))
                        <br><i class="fa icon-nm far fa-calendar-times text-white"></i>&nbsp; {{ $checkin->checkout->time }}
                    @endif
                    <br><a target="_blank" href="{{config('guesty.site.url')}}/reservations/{{$checkin->idguesty}}" class="btn btn-link btn-link-white mt-3">Go to guesty <i class="fa icon-nm fas fa-external-link-alt text-white"></i></a>
                </div>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="card card-spacer bgi-no-repeat gutter-b justify-content-between" style="background-color: #ffffff;  height:175px;">
            <!--begin::Row-->
            <div class="row m-0">
                <div class="col px-4 py-2">
                    <div class="font-size-sm text-muted font-weight-bold">Source</div>
                    <div class="font-size-h4 font-weight-bolder">{{$checkin->Source}}</div>
                </div>
                <div class="col px-4 py-2">
                    <div class="font-size-sm text-muted font-weight-bold">Code</div>
                    <div class="font-size-h4 font-weight-bolder">{{$checkin->confcode}}</div>
                </div>
            </div>
            <div class="row m-0">
                <div class="col px-4 py-2">
                    <div class="font-size-sm text-muted font-weight-bold">Nights</div>
                    <div class="font-size-h4 font-weight-bolder">{{$checkin->nights}}</div>
                </div>
                <div class="col px-4 py-2">
                    <div class="font-size-sm text-muted font-weight-bold">Guests</div>
                    <div class="font-size-h4 font-weight-bolder">{{$checkin->guests}}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="card card-spacer bgi-no-repeat gutter-b justify-content-between" style="background-color: #ffffff;  height:175px;">
            <!--begin::Row-->
            <div class="row m-0">
                <div class="col px-4 py-2">
                    <div class="font-size-sm text-muted font-weight-bold">Betalen</div>
                    <div class="font-size-h4 font-weight-bolder">€ {{$checkin->betalen}}</div>
                </div>
                <div class="col px-4 py-2">
                    <div class="font-size-sm text-muted font-weight-bold">Voldan</div>
                    <div class="font-size-h4 font-weight-bolder">€ {{$checkin->voldan}}</div>
                </div>
            </div>
            @if(!empty($checkin->note))
                <div class="row m-0">
                    <div class="alert alert-secondary w-100" role="alert" >{{$checkin->note}}</div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
