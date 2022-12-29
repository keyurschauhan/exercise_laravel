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
                        <h2 class="card-title mb-0">Edit State</h2>
                    </div>    
                </div>
                <hr class="mt-0" />


                <form id="stateform" name="stateform" action="{{ route('state.update',$state_details->id) }}" method="POST">
                @method('put')
                @csrf
                    
                    <div class="form-body">
                        <div class="row p-t-10">

                           <div class="col-md-12">
                                <div class="form-group">
                                <label class="control-label">Select Country<span class="text-danger">*</span></label>
                                @foreach($country_list as $country)
                                    <input type="hidden" name="hidden_text" id="hidden_text_{{ $country->id }}" value="{{ $country->name }}">
                                @endforeach
                                <select class="form-control" name="country" id="country">
                                    <option value=""> Select Country </option>
                                    @if(count($country_list) > 0)
                                        @foreach($country_list as $country)
                                        <option value="{{ $country->id }}" @if($state_details->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">State Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $state_details->name ?? '' }}" placeholder="State Name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">State Code<span class="text-danger require-span"></span></label>
                                    <input type="text" class="form-control" id="code" name="code" value="@if(!empty($state_details->code)){{  $state_details->code }} @endif" placeholder="State Code" disabled="true" onkeypress="return isOnlyNumber();" />
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        <a href="{{ route('state.index') }}" class="btn btn-inverse">Cancel</a>
                    </div>    
                    
                </form>
                
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('script')

<script type="text/javascript">
    $("form[name='stateform']").validate({
        rules: 
        {
            country:'required',
            name:'required'
        },
        messages: 
        {
            country:'Please enter select country.',
            name:'Please enter state name.',
            code:'Please enter state code.'
        }
    });

    $('#name').autocomplete({
        serviceUrl: '{{route("load_autocomplete.state")}}',
        onSelect: function (suggestion) {
            $(this).val(suggestion.data);
        }
    });

    $(document).on('change','#country',function(){
        var getValue = $(this).val();
        var getCountry = $('#hidden_text_'+getValue).val();
        let country = getCountry.toLowerCase();
        if(country == "india"){
            $('.require-span').html('*');
            $("input[id*=code]").rules("add", "required");
            $('#code').prop('disabled',false);   
        }
        else{
            $('.require-span').html('');
            $("#code").rules("remove", "required");
            $('#code').prop('disabled',true);
        }
    });

    $(document).ready(function(){
        var getValue = $('#country').val();
        var getCountry = $('#hidden_text_'+getValue).val();
        let country = getCountry.toLowerCase();
        if(country == "india"){
            $('.require-span').html('*');
            $("input[id*=code]").rules("add", "required");
            $('#code').prop('disabled',false);   
        }
        else{
            $('.require-span').html('');
            $("#code").rules("remove", "required");
            $('#code').prop('disabled',true);
        }
    });
</script>

@endsection