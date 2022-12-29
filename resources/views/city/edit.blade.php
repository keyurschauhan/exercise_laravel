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
                        <h2 class="card-title mb-0">Edit City</h2>
                    </div>    
                </div>
                <hr class="mt-0" />


                <form id="cityform" name="cityform" action="{{ route('city.update',$city_details->id) }}" method="POST">
                @method('put')
                @csrf
                    
                    <div class="form-body">
                        <div class="row p-t-10">

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">City Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $city_details->name }}" placeholder="City Name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Select Country<span class="text-danger">*</span></label>
                                <select class="form-control" name="state" id="state">
                                    <option value=""> Select State </option>
                                    @if(count($state_list) > 0)
                                        @foreach($state_list as $state)
                                        <option value="{{ $state->id }}" @if($city_details->state_id == $state->id) selected @endif>{{ $state->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">State Code</label>
                                    <input type="text" class="form-control" id="code" name="code" value="" placeholder="State Code" disabled="true" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" value="" placeholder="Country" disabled="true" />
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        <a href="{{ route('city.index') }}" class="btn btn-inverse">Cancel</a>
                    </div>    
                    
                </form>
                
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('script')

<script type="text/javascript">
    $("form[name='cityform']").validate({
        rules: 
        {
            state:'required',
            name:'required'
        },
        messages: 
        {
            state:'Please enter select country.',
            name:'Please enter city name.'
        }
    });

    $('#name').autocomplete({
        serviceUrl: '{{route("load_autocomplete.city")}}',
        onSelect: function (suggestion) {
            $(this).val(suggestion.data);
        }
    });

    $(document).ready(function(){
        var state_id = $('#state').val();
        if(state_id != ''){
            $.ajax({
                url: "{{route('city.get_state_data')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: "GET",
                data:'state_id='+state_id,
                success: function(result) {
                    $('#code').val(result.code);
                    $('#country').val(result.country);
                } 
            });    
        }
    });
    

    $(document).on('change','#state',function(){
        var state_id = $(this).val();

        $.ajax({
            url: "{{route('city.get_state_data')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: "GET",
            data:'state_id='+state_id,
            success: function(result) {
                $('#code').val(result.code);
                $('#country').val(result.country);
            } 
        });
    });
</script>

@endsection