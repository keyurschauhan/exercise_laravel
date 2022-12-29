@extends('layouts.main')
@section('title','City')

@section('page-title','City')
@section('content')

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-10">
                        <h2 class="card-title mb-0">Show City Details</h2>
                    </div>    
                    <div class="col-md-2 text-right">
                        <a class="btn btn-secondary" href="{{ route('city.index') }}">Back</a>
                    </div>    
                </div>
                <hr class="" />
                    
                    <div class="form-body">
                        <div class="row p-t-10">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">City Name</label><br/>
                                <b>{{ $city_details->name ?? '' }}</b>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">State Name</label><br/>
                                <b>{{ $city_details->state->name ?? '' }}</b>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">State Code</label><br/>
                                <b>@if(!empty($city_details->state->code)){{ $city_details->state->code }} @else - @endif</b>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Country Name</label><br/>
                                <b>{{ $city_details->state->country->name ?? '' }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    
</div>

@endsection