<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Customer;
use App\Models\CustomerContactDetail;
use Auth;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customer = Customer::where('created_by',Auth::user()->id)->paginate(10);
        $customer->appends($request->all())->render();
        $data['customer'] = $customer;
        return view('customers.index',$data);
    }


    public function create()
    {
        $data['city_list'] = City::where('created_by',Auth::user()->id)->get();
        return view('customers.create',$data);
    }


    public function store(Request $request)
    {

        $check_code = Customer::where(['code' => $request->code,'created_by' => Auth::user()->id])->first();
        if($check_code){
            return redirect()->back()->withInput()->with('error', 'This customer code already exist.');
        }
        else{
            $customer = new Customer;
            $customer->code = $request->code;
            $customer->name = $request->name;
            $customer->address = isset($request->address) ? $request->address:null;
            $customer->city_id = $request->city;
            $customer->pincode = isset($request->pincode) ? $request->pincode:null;
            $customer->phone_no = isset($request->phone_no) ? $request->phone_no:null;
            $customer->email = isset($request->email) ? $request->email:null;
            $customer->web_address = isset($request->web_address) ? $request->web_address:null;
            $customer->gst = isset($request->gst) ? $request->gst:null;
            $customer->pan = isset($request->pan) ? $request->pan:null;
            $customer->payment_terms = isset($request->payment_terms) ? $request->payment_terms:null;
            $customer->created_by = Auth::user()->id;
            $customer->save();


            if(count($request->hidden_id) > 0){
                foreach($request->hidden_id as $key => $contactdata){

                    $contact_name_nm =  'contact_name_'.$key;
                    $contact_mobile_no_nm =  'contact_mobile_no_'.$key;
                    $contact_email_nm =  'contact_email_'.$key;

                    $send_sms_report_nm =  'send_sms_report_'.$key;
                    $send_sms_invoice_nm =  'send_sms_invoice_'.$key;
                    $send_email_report_nm =  'send_email_report_'.$key;
                    $send_email_invoice_nm =  'send_email_invoice_'.$key;

                    $send_sms_report = 0;
                    if(isset($request->$send_sms_report_nm)){
                        $send_sms_report = 1;
                    } 

                    $send_sms_invoice = 0;
                    if(isset($request->$send_sms_invoice_nm)){
                        $send_sms_invoice = 1;
                    }

                    $send_email_report = 0;
                    if(isset($request->$send_email_report_nm)){
                         $send_email_report = 1;
                    } 

                    $send_email_invoice = 0;
                    if($request->$send_email_invoice_nm){
                       if(isset($request->$send_email_invoice_nm)){
                             $send_email_invoice = 1;
                       } 
                    }

                    $customer_contact = new CustomerContactDetail;
                    $customer_contact->customer_id = $customer->id;
                    $customer_contact->contact_name = isset($request->$contact_name_nm) ? $request->$contact_name_nm:null;
                    $customer_contact->designation = isset($request->designation[$key]) ? $request->designation[$key]:null;
                    $customer_contact->phone_no = isset($request->contact_phone_no[$key]) ? $request->contact_phone_no[$key]:null;
                    $customer_contact->mobile_no = isset($request->$contact_mobile_no_nm) ? $request->$contact_mobile_no_nm:null;
                    $customer_contact->email = isset($request->$contact_email_nm) ? $request->$contact_email_nm:null;
                    $customer_contact->send_sms_report = $send_sms_report;
                    $customer_contact->send_sms_invoice = $send_sms_invoice;
                    $customer_contact->send_email_report = $send_email_report;
                    $customer_contact->send_email_invoice = $send_email_invoice;
                    $customer_contact->save();
                }
            }


            return redirect()->route('customers.index')->with('success', 'Customer added successfully.');    
        }
    }


    public function show($id)
    {
        $data['customer_details'] = Customer::where('id',$id)->first();
        return view('customers.show',$data);
    }


    public function edit($id)
    {
        $data['city_list'] = City::where('created_by',Auth::user()->id)->get();
        $data['customer_details'] = Customer::where('id',$id)->first();
        $data['customer_contact_details'] = CustomerContactDetail::where('customer_id',$id)->get();

        return view('customers.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $check_code = Customer::where(['code' => $request->code,'created_by' => Auth::user()->id])->where('id','!=',$id)->first();
        if($check_code){
            return redirect()->back()->withInput()->with('error', 'This customer code already exist.');
        }
        else{
            $customer = Customer::find($id);
            $customer->code = $request->code;
            $customer->name = $request->name;
            $customer->address = isset($request->address) ? $request->address:null;
            $customer->city_id = $request->city;
            $customer->pincode = isset($request->pincode) ? $request->pincode:null;
            $customer->phone_no = isset($request->phone_no) ? $request->phone_no:null;
            $customer->email = isset($request->email) ? $request->email:null;
            $customer->web_address = isset($request->web_address) ? $request->web_address:null;
            $customer->gst = isset($request->gst) ? $request->gst:null;
            $customer->pan = isset($request->pan) ? $request->pan:null;
            $customer->payment_terms = isset($request->payment_terms) ? $request->payment_terms:null;
            $customer->created_by = Auth::user()->id;
            $customer->save();

            CustomerContactDetail::where('customer_id',$customer->id)->delete();

            if(count($request->hidden_id) > 0){
                foreach($request->hidden_id as $key => $contactdata){

                    $contact_name_nm =  'contact_name_'.$key;
                    $contact_mobile_no_nm =  'contact_mobile_no_'.$key;
                    $contact_email_nm =  'contact_email_'.$key;

                    $send_sms_report_nm =  'send_sms_report_'.$key;
                    $send_sms_invoice_nm =  'send_sms_invoice_'.$key;
                    $send_email_report_nm =  'send_email_report_'.$key;
                    $send_email_invoice_nm =  'send_email_invoice_'.$key;

                    $send_sms_report = 0;
                    if(isset($request->$send_sms_report_nm)){
                        $send_sms_report = 1;
                    } 

                    $send_sms_invoice = 0;
                    if(isset($request->$send_sms_invoice_nm)){
                        $send_sms_invoice = 1;
                    }

                    $send_email_report = 0;
                    if(isset($request->$send_email_report_nm)){
                         $send_email_report = 1;
                    } 

                    $send_email_invoice = 0;
                    if($request->$send_email_invoice_nm){
                       if(isset($request->$send_email_invoice_nm)){
                             $send_email_invoice = 1;
                       } 
                    }

                    $customer_contact = new CustomerContactDetail;
                    $customer_contact->customer_id = $customer->id;
                    $customer_contact->contact_name = isset($request->$contact_name_nm) ? $request->$contact_name_nm:null;
                    $customer_contact->designation = isset($request->designation[$key]) ? $request->designation[$key]:null;
                    $customer_contact->phone_no = isset($request->contact_phone_no[$key]) ? $request->contact_phone_no[$key]:null;
                    $customer_contact->mobile_no = isset($request->$contact_mobile_no_nm) ? $request->$contact_mobile_no_nm:null;
                    $customer_contact->email = isset($request->$contact_email_nm) ? $request->$contact_email_nm:null;
                    $customer_contact->send_sms_report = $send_sms_report;
                    $customer_contact->send_sms_invoice = $send_sms_invoice;
                    $customer_contact->send_email_report = $send_email_report;
                    $customer_contact->send_email_invoice = $send_email_invoice;
                    $customer_contact->save();
                }
            }


            return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');    
        }
    }

    public function destroy($id)
    {
        CustomerContactDetail::where('customer_id',$id)->delete();
        Customer::where('id',$id)->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }


    public function load_autocomplete(request $request)
    {   
        $response=[];
        $customer_detail=Customer::where('name', 'like', '%' . $request['query'] . '%')->where('created_by',Auth::user()->id)->get();
        

        if(count($customer_detail) > 0)
        {
            foreach ($customer_detail as $value) {
                $response[] = array("value"=>$value->name,"data"=>$value->name);
            }   
        }
        return json_encode(array("suggestions" => $response));

    }

    public function load_autocomplete_payment_terms(Request $request)
    {   
        $response=[];
        $terms_detail=Customer::where('payment_terms', 'like', '%' . $request['query'] . '%')->where('created_by',Auth::user()->id)->get();
        

        if(count($terms_detail) > 0)
        {
            foreach ($terms_detail as $value) {
                $response[] = array("value"=>$value->payment_terms,"data"=>$value->payment_terms);
            }   
        }
        return json_encode(array("suggestions" => $response));

    }

    public function load_autocomplete_designation(Request $request){

        $response=[];
        $designation_detail=CustomerContactDetail::where('designation', 'like', '%' . $request['query'] . '%')->pluck('designation');

        if(count($designation_detail) > 0)
        {
            foreach ($designation_detail as $value) {
                $response[] = array("value"=>$value,"data"=>$value);
            }   
        }
        return json_encode(array("suggestions" => $response));
        
    }

    

    public function getCityData(Request $request){
        $get_details = City::where('id',$request->city_id)->first();
        $code = null;$country_nm=null;$state=null;
        if($get_details){
            if(!empty($get_details->state->code)){ $code = $get_details->state->code; }
            if(!empty($get_details->state->name)){ $state = $get_details->state->name; }
            if(!empty($get_details->state->country->name)){ $country_nm = $get_details->state->country->name; }
        }
        $data=['code' => $code,'country' => $country_nm,'state' => $state];
        return response()->json($data);
    }
    
}
