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
                        <h2 class="card-title mb-0">Add Customer</h2>
                    </div>    
                </div>
                <hr class="mt-0" />


                <form id="customerform" name="customerform" action="{{ route('customers.store') }}" method="POST">
                @csrf
                    
                    <div class="form-body">
                        <div class="row p-t-10">

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Customer Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ old('code') ?? '' }}" placeholder="Customer Code">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Customer Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? '' }}" placeholder="Customer Name">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                <label class="control-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" value="{{ old('address') ?? '' }}" placeholder="Address">{{ old('address') ?? '' }}</textarea>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Select City<span class="text-danger">*</span></label>
                                <select class="form-control" name="city" id="city">
                                    <option value=""> Select City </option>
                                    @if(count($city_list) > 0)
                                        @foreach($city_list as $city)
                                        <option value="{{ $city->id }}" @if(old('name')) @if(old('city') == $city->id) selected @endif @endif>{{ $city->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Pincode</label>
                                    <input type="text" class="form-control" id="pincode" name="pincode" value="{{ old('pincode') ?? '' }}" placeholder="PinCode" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">State</label>
                                    <input type="text" class="form-control" id="state" name="state" value="{{ old('state') ?? '' }}" placeholder="State" disabled="true" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">State Code</label>
                                    <input type="text" class="form-control" id="state_code" name="state_code" value="{{ old('state_code') ?? '' }}" placeholder="State Code" disabled="true" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" value="" placeholder="Country" disabled="true" />
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Phone Number</label>
                                    <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ old('phone_no') ?? '' }}" onkeypress="return isOnlyNumber();" maxlength="15" placeholder="Phone Number" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? '' }}" placeholder="Email" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Web Address</label>
                                    <input type="text" class="form-control" id="web_address" name="web_address" value="{{ old('web_address') ?? '' }}" placeholder="Web Address" />
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">GSTIN</label>
                                    <input type="text" class="form-control" id="gst" name="gst" value="{{ old('gst') ?? '' }}" disabled="true" minlength="15" maxlength="15" placeholder="GSTIN" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">PAN Number</label>
                                    <input type="text" class="form-control" id="pan" name="pan" value="{{ old('pan') ?? '' }}" disabled="true" minlength="10" maxlength="10" placeholder="PAN Number" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Payment Terms</label>
                                    <input type="text" class="form-control" id="payment_terms" name="payment_terms" value="{{ old('payment_terms') ?? '' }}" placeholder="Payment Terms" />
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <h4>Customer Contact Details</h4>
                        </div>
                        <hr/>

                        <div class="row">
                            <input type="hidden" name="hidden_id[]" value="0">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="control-label">Contact Person Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact_name_0" name="contact_name_0" required="true" placeholder="Contact Person Name">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Designation</label>
                                    <input type="text" class="form-control designation" id="designation_0" name="designation[]"  placeholder="Designation">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Phone Number</label>
                                    <input type="text" class="form-control" id="contact_phone_no_0" name="contact_phone_no[]" onkeypress="return isOnlyNumber();" maxlength="15"  placeholder="Phone Number">
                                </div>
                            </div>

                            <div class="col-md-1 text-right">
                                <div class="form-group">
                                    <a href="javascript:;" class=" btn btn-success add_field_button"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                <label class="control-label">Mobile Number<span class="text-danger" id="require_contact_mobile_no_0"></span></label>
                                <input type="text" class="form-control" id="contact_mobile_no_0" name="contact_mobile_no_0" onkeypress="return isOnlyNumber();" maxlength="10" placeholder="Mobile Number">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                <label class="control-label">Email<span class="text-danger" id="require_contact_email_0"></span></label>
                                <input type="email" class="form-control" id="contact_email_0" name="contact_email_0" placeholder="Email">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                <label class="control-label">Send SMS For</label>
                                <div class="col-md-12">
                                    <label class="checkbox checkbox-success mr-2">
                                        <input id="send_sms_report_0" data-id="0" name="send_sms_report_0" value="1" type="checkbox" class="custom-control-input send_sms_report">
                                        <label for="send_sms_report_0">Report</label>
                                    </label>
                                    <label class="checkbox checkbox-success">
                                        <input id="send_sms_invoice_0" data-id="0" name="send_sms_invoice_0" value="1" type="checkbox" class="custom-control-input send_sms_invoice">
                                        <label for="send_sms_invoice_0">Invoice</label>
                                    </label>
                                </div>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                <label class="control-label">Send Email For</label>
                                <div class="col-md-12">
                                    <label class="checkbox checkbox-success mr-2">
                                        <input id="send_email_report_0" data-id="0" name="send_email_report_0" value="1" type="checkbox" class="custom-control-input send_email_report">
                                        <label for="send_email_report_0">Report</label>
                                    </label>
                                    <label class="checkbox checkbox-success">
                                        <input id="send_email_invoice_0" data-id="0" name="send_email_invoice_0" value="1" type="checkbox" class="custom-control-input send_email_invoice">
                                        <label for="send_email_invoice_0">Invoice</label>
                                    </label>
                                </div>
                                </div>
                            </div>

                        </div>

                        <div class="newPlus">                                 
                        </div>

                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        <a href="{{ route('customers.index') }}" class="btn btn-inverse">Cancel</a>
                    </div>    
                    
                </form>
                
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('script')

<script type="text/javascript">
    $("form[name='customerform']").validate({
        rules: 
        {
            city:'required',
            name:'required',
            code:'required'
        },
        messages: 
        {
            city:'Please select city.',
            name:'Please enter customer name.',
            code:'Please enter customer code.'
        }
    });

    $('#name').autocomplete({
        serviceUrl: '{{route("load_autocomplete.customer")}}',
        onSelect: function (suggestion) {
            $(this).val(suggestion.data);
        }
    });

    $('#payment_terms').autocomplete({
        serviceUrl: '{{route("load_autocomplete.payment_terms")}}',
        onSelect: function (suggestion) {
            $(this).val(suggestion.data);
        }
    });

    $('.designation').autocomplete({
        serviceUrl: '{{route("load_autocomplete.designation")}}',
        onSelect: function (suggestion) {
            $(this).val(suggestion.data);
        }
    });

    

    

    $(document).ready(function(){
        var city_id = $('#city').val();
        if(city_id != ''){
            $.ajax({
                url: "{{route('customer.get_city_data')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: "GET",
                data:'city_id='+city_id,
                success: function(result) {
                    $('#state').val(result.state);
                    $('#state_code').val(result.code);
                    $('#country').val(result.country);
                    var country = result.country.toLowerCase();
                    if(country == "india"){
                        $('#gst').prop('disabled',false);
                        $('#pan').prop('disabled',false);   
                    }
                    else{
                        $('#gst').prop('disabled',true);
                        $('#pan').prop('disabled',true);
                    }
                } 
            });    
        }
    });
    

    $(document).on('change','#city',function(){
        var city_id = $(this).val();

        $.ajax({
            url: "{{route('customer.get_city_data')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: "GET",
            data:'city_id='+city_id,
            success: function(result) {
                $('#state').val(result.state);
                $('#state_code').val(result.code);
                $('#country').val(result.country);
                var country = result.country.toLowerCase();
                if(country == "india"){
                    $('#gst').prop('disabled',false);
                    $('#pan').prop('disabled',false);   
                }
                else{
                    $('#gst').prop('disabled',true);
                    $('#pan').prop('disabled',true);
                }

            } 
        });
    });


    var max_fields      = 30;
    var wrapper         = $(".newPlus");
    var add_button      = $(".add_field_button");

    var x = 0;
    $(add_button).click(function(e){
        e.preventDefault();
        if(x < max_fields){
            x++;
            $(wrapper).append('<div class="newMinus row"><input type="hidden" name="hidden_id[]" value="'+x+'"><div class="col-md-4"><div class="form-group"><label class="control-label">Contact Person Name<span class="text-danger">*</span></label><input type="text" class="form-control" id="contact_name_'+x+'" name="contact_name_'+x+'" required="true" placeholder="Contact Person Name"></div></div><div class="col-md-4"><div class="form-group"><label class="control-label">Designation</label><input type="text" class="form-control designation" id="designation_'+x+'" name="designation[]"  placeholder="Designation"></div></div><div class="col-md-3"><div class="form-group"><label class="control-label">Phone Number</label><input type="text" class="form-control" id="contact_phone_no_'+x+'" name="contact_phone_no[]"  placeholder="Phone Number" onkeypress="return isOnlyNumber();" maxlength="15"></div></div><div class="col-md-1 text-right"><div class="form-group"><a href="javascript:;" class="btn btn-danger remove_field"><i class="fa fa-minus"></i></a></div></div><div class="col-md-3"><div class="form-group"><label class="control-label">Mobile Number<span class="text-danger" id="require_contact_mobile_no_'+x+'"></span></label><input type="text" class="form-control" id="contact_mobile_no_'+x+'" onkeypress="return isOnlyNumber();" maxlength="10" name="contact_mobile_no_'+x+'" placeholder="Mobile Number"></div></div><div class="col-md-3"><div class="form-group"><label class="control-label">Email<span class="text-danger" id="require_contact_email_'+x+'"></span></label><input type="email" class="form-control" id="contact_email_'+x+'" name="contact_email_'+x+'" placeholder="Email"></div></div><div class="col-md-2"><div class="form-group"><label class="control-label">Send SMS For</label><div class="col-md-12"><label class="checkbox checkbox-success mr-2"><input id="send_sms_report_'+x+'" data-id="'+x+'" name="send_sms_report_'+x+'" value="1" type="checkbox" class="custom-control-input send_sms_report"><label for="send_sms_report_'+x+'">Report</label></label><label class="checkbox checkbox-success"><input id="send_sms_invoice_'+x+'" data-id="'+x+'" name="send_sms_invoice_'+x+'" value="1" type="checkbox" class="custom-control-input send_sms_invoice"><label for="send_sms_invoice_'+x+'">Invoice</label></label></div></div></div><div class="col-md-2"><div class="form-group"><label class="control-label">Send Email For</label><div class="col-md-12"><label class="checkbox checkbox-success mr-2"><input id="send_email_report_'+x+'" name="send_email_report_'+x+'" data-id="'+x+'" value="1" type="checkbox" class="custom-control-input send_email_report"><label for="send_email_report_'+x+'">Report</label></label><label class="checkbox checkbox-success"><input id="send_email_invoice_'+x+'" data-id="'+x+'" name="send_email_invoice_'+x+'" value="1" type="checkbox" class="custom-control-input send_email_invoice"><label for="send_email_invoice_'+x+'">Invoice</label></label></div></div></div></div>');
                $('.designation').autocomplete({
                    serviceUrl: '{{route("load_autocomplete.designation")}}',
                    onSelect: function (suggestion) {
                        $(this).val(suggestion.data);
                    }
                });
        }
    });

    $(wrapper).on("click",".remove_field", function(e){
        e.preventDefault();
        $(this).closest(".newMinus").remove();
    })

    $(document).on('change','.send_sms_report',function(){
        var getid = $(this).attr('data-id');
        if ($(this).prop('checked')) {
            $('#require_contact_mobile_no_'+getid).html('*');
            $("input[id*=contact_mobile_no_"+getid+"]").rules("add", "required");
        }
        else{
            $('#require_contact_mobile_no_'+getid).html('');
            $('#contact_mobile_no_'+getid).rules("remove", "required");;
        }        
    });

    $(document).on('change','.send_sms_invoice',function(){
        var getid = $(this).attr('data-id');
        if ($(this).prop('checked')) {
            $('#require_contact_mobile_no_'+getid).html('*');
            $('#contact_mobile_no_'+getid).rules("add", "required");
        }
        else{
            $('#require_contact_mobile_no_'+getid).html('');
            $('#contact_mobile_no_'+getid).rules("remove", "required");
        }        
    });

    $(document).on('change','.send_email_report',function(){
        var getid = $(this).attr('data-id');
        if ($(this).prop('checked')) {
            $('#require_contact_email_'+getid).html('*');
            $('#contact_email_'+getid).rules("add", "required");
        }
        else{
            $('#require_contact_email_'+getid).html('');
            $('#contact_email_'+getid).rules("remove", "required");
        }       
    });

    $(document).on('change','.send_email_invoice',function(){
        var getid = $(this).attr('data-id');
        if ($(this).prop('checked')) {
            $('#require_contact_email_'+getid).html('*');
            $('#contact_email_'+getid).rules("add", "required");
        }
        else{
            $('#require_contact_email_'+getid).html('');
            $('#contact_email_'+getid).rules("remove", "required");
        }        
    });


    
</script>

@endsection