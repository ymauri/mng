@php
 $action = empty($rule) ? 'Add' : 'Edit';

 $page_breadcrumbs = [
     ["page" => "/", 'title' => "Guesty"],
     ["page" => "/rule", 'title' => "Rule"],
     ["page" => "/rule/".strtolower($action), 'title' => $action]
 ];
@endphp
@extends('layout.default')

@section('content')
<form method="POST" action=" @empty($rule){{ route('rule.create') }} @else {{route("rule.update", ['rule' => $rule->id]) }} @endempty">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title">{{$action}} Rule</h3>
            <div class="card-toolbar">
                <label class="col-form-label">Active</label>
                <div class="col-3">
                    <span class="switch switch-sm switch-icon">
                        <label>
                        <input type="checkbox" @if(!empty($rule)) checked="checked" @endif name="isactive"/>
                        <span></span>
                        </label>
                    </span>
                </div>
            </div>
        </div>
        <!--begin::Form-->
            @csrf
            @if(!empty($rule)) <input type="hidden" name="id" value="{{$rule->id}}"> @endif
            <div class="card-body">
                <h3 class="font-size-lg text-dark font-weight-bold mb-6">1. Basic Info:</h3>
                <div class="row">
                    <div class="form-group col-12 col-lg-4">
                        <label>Name</label>
                        <textarea id="name" rows="3" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus placeholder="Name">{{ !empty($rule) ? $rule->name : old("name") }}</textarea>
                        <span class="form-text text-muted">Please enter the rule name</span>
                    </div>
                    <div class="form-group col-12 col-lg-4">
                        <label>Description</label>
                        <textarea id="details" rows="3" class="form-control form-control-solid @error('details') is-invalid @enderror" name="details"  required autocomplete="name" placeholder="Details">{{ !empty($rule) ? $rule->details : old("details") }}</textarea>
                        <span class="form-text text-muted">Please enter the rule description</span>
                    </div>
                    <div class="form-group col-12 col-lg-4">
                        <label>Priority</label>
                        <input id="priority" type="number" step="1" class="form-control form-control-solid @error('priority') is-invalid @enderror" name="priority" value="{{ !empty($rule) ? $rule->priority : old("name") }}" required autocomplete="name" placeholder="Priority">
                        <span class="form-text text-muted">Priority for rule execute</span>
                    </div>
                    <div class="form-group col-12 col-lg-4">
                        <label>Listings</label>
                        <select name="listings[]" id="listings" class="form-control form-control-solid select2" multiple="multiple">
                            @foreach ($listings as $listing)
                                <option value="{{$listing->idguesty}}" @if (in_array($listing->idguesty, $rule->apartments)) selected @endif>{{$listing->value}}
                                    @foreach ($listing->type as $type)
                                        @if($type== "Apartment" || $type == "Studio")
                                            <strong class="text-danger">({{$type}})</strong>
                                        @endif
                                    @endforeach
                                </option>
                            @endforeach
                        </select>
                        <span class="form-text text-muted">If there is no selected listings will be affected all of them</span>
                    </div>
                    <div class="form-group col-12 col-lg-4">
                        <label>Condition</label>
                        <select name="condition" id="condition" class="form-control form-control-solid">
                            <option value="listing_available_more" @if(!empty($rule) && $rule->condition == "listing_available_more") selected @endif>More than X listings availables </option>
                            <option value="listing_available_less" @if(!empty($rule) && $rule->condition == "listing_available_less") selected @endif>Less than X listings availables </option>
                            <option value="none_condition" @if(!empty($rule) && $rule->condition == "none_condition") selected @endif>No Condition</option>
                        </select>
                        <span class="form-text text-muted">This condition will trigger the rule execution</span>
                    </div>
                    <div class="form-group col-12 col-lg-4">
                        <label>Condition value</label>
                        <input id="conditionvalue" type="number" step="1" class="form-control form-control-solid @error('conditionvalue') is-invalid @enderror" name="conditionvalue" value="{{ !empty($rule) ? $rule->conditionvalue : old("conditionvalue") }}" required autocomplete="conditionvalue" placeholder="Condition value">
                        <span class="form-text text-muted">This condition value will trigger the rule execution</span>
                    </div>
                    <div class="form-group col-12">
                        <label>When rule will be executed?</label>
                        <div class="radio-inline pt-3">
                            <label class="radio radio-solid">
                            <input type="radio" name="ishook"  @empty($rule->ishook) checked="checked" @endempty value="0">
                            <span></span>At a specific date/time</label>
                            <label class="radio radio-solid">
                            <input type="radio" name="ishook" @if($rule->ishook) checked="checked" @endif value="1">
                            <span></span>When a guesty event occurs</label>
                        </div>
                        <span class="form-text text-muted">Select when the rule will be excecuted</span>
                    </div>
                </div>
                <div class="separator my-5"></div>
                <h3 class="font-size-lg text-dark font-weight-bold mb-6">2. Pricing info:</h3>
                <div class="row">
                    <div class="form-group col-12 col-lg-4">
                        <label>Action</label>
                        <select name="action" id="action" class="form-control form-control-solid">
                            <option value="listing_lower_price" @if(!empty($rule) && $rule->action == "listing_lower_price") selected @endif>Lower price</option>
                            <option value="listing_raise_price" @if(!empty($rule) && $rule->action == "listing_raise_price") selected @endif>Rise price</option>
                            <option value="listing_change_price" @if(!empty($rule) && $rule->action == "listing_change_price") selected @endif>Change price</option>
                        </select>
                        <span class="form-text text-muted">This is what the rule will do</span>
                    </div>
                    <div class="form-group col-12 col-lg-4">
                        <label>Action value</label>
                        <input id="actionvalue" type="number" step="1" class="form-control form-control-solid @error('conditionvalue') is-invalid @enderror" name="actionvalue" value="{{ !empty($rule) ? $rule->actionvalue : old("actionvalue") }}" required autocomplete="actionvalue" placeholder="Action value">
                        <span class="form-text text-muted">This is the price value</span>
                    </div>
                    <div class="form-group col-12 col-lg-4">
                        <label>Unit</label>
                        <div class="radio-inline pt-3">
                            <label class="radio radio-solid">
                            <input type="radio" name="unit" checked="checked" value="percentage">
                            <span></span>Percentage (%)</label>
                            <label class="radio radio-solid">
                            <input type="radio" name="unit" value="euro">
                            <span></span>Euro (€)</label>
                        </div>
                        <span class="form-text text-muted">Select the unit according to the price</div>
                    </div>

                <div class="separator my-5"></div>
                <h3 class="font-size-lg text-dark font-weight-bold mb-6">3. Date info:</h3>
                <div class="row">
                    <div class="form-group col-12 col-lg-4">
                        <label>Executes on</label>
                        <select name="daysahead" id="daysahead" class="form-control form-control-solid">
                            <option value="0" @if(!empty($rule) && $rule->daysahead == 0) selected @endif>Today</option>
                            <option value="1" @if(!empty($rule) && $rule->daysahead == 1) selected @endif>Tomorrw</option>
                            @for ($i = 2; $i <= 50; $i++)
                                <option value="{{$i}}" @if(!empty($rule) && $rule->daysahead == $i) selected @endif>{{$i}} days from now</option>
                            @endfor
                        </select>
                        <span class="form-text text-muted">Select when the change will be applied</span>
                    </div>

                    <div class="form-group col-12 col-lg-4"  @if($rule->ishook) style="display:none;" @endif>
                        <label>Date range</label>
                        <input id="daterange" type="text" data-date-format="yyyy-mm-dd" class="form-control form-control-solid " name="daterange" placeholder="Date range" required>
                        <span class="form-text text-muted">Select the dated when the rule will be execute</span>
                    </div>
                    <div class="form-group col-12 col-lg-4" @if($rule->ishook) style="display:none;" @endif>
                        <label>Executes at</label>
                        <input id="time" type="text" class="form-control form-control-solid " name="time" placeholder="Executes at" required>
                        <span class="form-text text-muted">Select the time when the rule will be execute</span>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="col-form-label">
                                <label class="col-form-label">Day of the week</label>
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="dayweek[]" value="1"/>
                                        <span></span>
                                        Maandag
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="dayweek[]" value="2"/>
                                        <span></span>
                                        Dinsdag
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="dayweek[]" value="3"/>
                                        <span></span>
                                        Woensdag
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="dayweek[]" value="4"/>
                                        <span></span>
                                        Donderdag
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="dayweek[]" value="5"/>
                                        <span></span>
                                        Vrijdag
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="dayweek[]" value="6"/>
                                        <span></span>
                                        Zaterdag
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="dayweek[]" value="7"/>
                                        <span></span>
                                            Zondag
                                    </label>
                                </div>
                                <span class="form-text text-muted">Select one or more days of the week</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a type="button" href="{{route('rule.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
    </div>
</form>

@endsection
@section('scripts')
    <script src="{{ asset('js/rule/rule.js') }}" type="text/javascript"></script>
@endsection
