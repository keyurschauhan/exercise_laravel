@extends('layouts.main')
@section('title','Country')

@section('page-title','Country')
@section('content')

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-10">
                        <h2 class="card-title mb-0">Add Country</h2>
                    </div>    
                </div>
                <hr class="mt-0" />


                <form id="countryform" name="countryform" action="{{ route('country.store') }}" method="POST">
                @csrf
                    
                    <div class="form-body">
                        <div class="row p-t-10">

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Country Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="@if(old('name')) {{ old('name') }} @else India @endif">
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        <a href="{{ route('country.index') }}" class="btn btn-inverse">Cancel</a>
                    </div>    
                    
                </form>
                
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('script')

<script type="text/javascript">
    $("form[name='countryform']").validate({
        rules: 
        {
          name:'required'
        },
        messages: 
        {
          name:'Please enter country name.'
        }
    });

    $('#name').autocomplete({
        serviceUrl: '{{route("load_autocomplete.country")}}',
        onSelect: function (suggestion) {
            $(this).val(suggestion.data);
        }
    });
</script>

@endsection