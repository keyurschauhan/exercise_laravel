@extends('layouts.main')
@section('title','State')

@section('page-title','State')
@section('content')

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-10">
                        <h2 class="card-title mb-0">Show State Details</h2>
                    </div>    
                    <div class="col-md-2 text-right">
                        <a class="btn btn-secondary" href="{{ route('state.index') }}">Back</a>
                    </div>    
                </div>
                <hr class="" />
                    
                    <div class="form-body">
                        <div class="row p-t-10">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">State Name</label><br/>
                                <b>{{ $state_details->name ?? '' }}</b>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">State Code</label><br/>
                                <b>{{ $state_details->code ?? '' }}</b>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Country Name</label><br/>
                                <b>{{ $state_details->country->name ?? '' }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    
</div>

@endsection