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
                        <h2 class="card-title mb-0">Customers List</h2>
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="{{ route('customers.create') }}" class="btn btn-primary"><i class="fa fa-plus pr-1"></i>Add</a>
                    </div>    
                </div>
                <hr />

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Customer</th>
                                <th>Code</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Web</th>
                                <th>GSTIN</th>
                                <th>Modified By</th>
                                <th>Modified On</th>
                                <th>Created By</th>
                                <th>Created On</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($customer) > 0)
                                @foreach($customer as $key => $data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->name ?? '' }}</td>
                                        <td>{{ $data->code ?? '' }}</td>
                                        <td>{{ $data->city->name ?? '' }}</td>
                                        <td>{{ $data->city->state->name ?? '' }}</td>
                                        <td>{{ $data->city->state->country->name ?? '' }}</td>
                                        <td>{{ $data->phone_no ?? '-' }}</td>
                                        <td>{{ $data->email ?? '-' }}</td>
                                        <td>{{ $data->web_address ?? '-' }}</td>
                                        <td>{{ $data->gst ?? '-' }}</td>
                                        <td>@if($data->updated_by) {{ $data->updatedUser->name }} @else - @endif</td>
                                        <td>@if($data->updated_at) {{ date('d-m-Y H:i:s',strtotime($data->updated_at)) }} @endif</td>
                                        <td>@if($data->created_by) {{ $data->createdUser->name ?? '' }} @else - @endif</td>
                                        <td>@if($data->created_at) {{ date('d-m-Y H:i:s',strtotime($data->created_at)) }} @endif</td>
                                        <td class="text-nowrap d-flex">
                                            <a href="{{ route('customers.show',$data->id) }}" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-eye btn btn-info m-r-10"></i> </a>
                                            <a href="{{ route('customers.edit',$data->id) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil btn btn-success m-r-10"></i> </a>
                                            <form action="{{URL::route('customers.destroy',$data->id)}}" method="POST" id="{{$data->id}}">@method('delete')
                                            @csrf
                                                <button type="submit" name="submit" data-id="{{$data->id}}"  class="hideBtn submitData_{{$data->id}} d-none"><i class="ft-trash-2"></i> Submit</button>
                                                <a class="delete cursor-pointer" data-toggle="tooltip" data-original-title="Close" data-id="{{ $data->id }}"> <i class="fa fa-close btn btn-danger"></i> </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="15">No records found.  </td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <div class="row">
                    <div class="col-md-12 paginations">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mb-0">
                            
                                @if(isset($customer)){!! $customer->render() !!}@endif
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('script')

<script type="text/javascript">
    $(document).on('click','.delete',function(){
        var id=$(this).data('id');
        var getval = $(this).data('value');
        bootbox.confirm("Are you sure you want to delete this customer ?", function(result){ 
            if(result == true)
            {   
              $('.submitData_'+id).trigger('click');
            }
        });
    });
</script>
@endsection