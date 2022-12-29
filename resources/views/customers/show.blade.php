@extends('layouts.main')
@section('title','Customers')

@section('page-title','Customers')
@section('content')

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-10">
                        <h2 class="card-title mb-0">Show Customers Details</h2>
                    </div>    
                    <div class="col-md-2 text-right">
                        <a class="btn btn-secondary" href="{{ route('customers.index') }}">Back</a>
                    </div>    
                </div>
                <hr class="" />
                    
                    <div class="form-body">
                        <div class="row p-t-10">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="control-label">Customer Name</label><br/>
                                <b>{{ $customer_details->name ?? '' }}</b>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="control-label">Customer Code</label><br/>
                                <b>{{ $customer_details->code ?? '' }}</b>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="control-label">Phone Number</label><br/>
                                <b>{{ $customer_details->phone_no ?? '' }}</b>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="control-label">City</label><br/>
                                <b>{{ $customer_details->city->name ?? '' }}</b>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="control-label">State</label><br/>
                                <b>@if(!empty($customer_details->city->state->name)){{ $customer_details->city->state->name }} @else - @endif</b>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="control-label">Country Name</label><br/>
                                <b>{{ $customer_details->city->state->country->name ?? '' }}</b>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="control-label">Email</label><br/>
                                <b>{{ $customer_details->email ?? '' }}</b>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="control-label">Web Address</label><br/>
                                <b>{{ $customer_details->web_address ?? '' }}</b>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="control-label">GSTIN</label><br/>
                                <b>{{ $customer_details->gst ?? '' }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    
</div>

@endsection