@extends('layouts.main')
@section('title','Dashboard')

@section('page-title','Dashboard')
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6">
        <a href="{{ route('customers.index') }}">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8"><h2>{{ $customer_count ?? 0 }} </h2>
                            <h6>Customers</h6></div>
                        <div class="col-4 align-self-center text-right  p-l-0">
                            <i class="fa fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection
