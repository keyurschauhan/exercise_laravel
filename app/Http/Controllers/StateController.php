<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use Auth;

class StateController extends Controller
{
    public function index(Request $request)
    {
        $state = State::where('created_by',Auth::user()->id)->paginate(10);
        $state->appends($request->all())->render();
        $data['state'] = $state;
        return view('state.index',$data);
    }

    public function create()
    {
        $data['country_list'] = Country::where('created_by',Auth::user()->id)->get();
        return view('state.create',$data);
    }


    public function store(Request $request)
    {
        $check_state = State::where(['name' => $request->name,'created_by' => Auth::user()->id])->first();
        $check_state_code = State::where(['code' => $request->code,'created_by' => Auth::user()->id])->first();
        if($check_state){
            return redirect()->back()->withInput()->with('error', 'This state name already exist.');
        }    
        elseif ($check_state_code) {
            return redirect()->back()->withInput()->with('error', 'This state code already exist.');
        }
        else{
            $state = new State;
            $state->country_id = $request->country;
            $state->name = $request->name;
            $state->code = isset($request->code) ? $request->code:0;
            $state->created_by = Auth::user()->id;
            $state->save();
            return redirect()->route('state.index')->with('success', 'State added successfully.');    
        }
    }

    public function show($id)
    {
        $data['state_details'] = State::where('id',$id)->first();
        return view('state.show',$data);
    }


    public function edit($id)
    {
        $data['country_list'] = Country::where('created_by',Auth::user()->id)->get();
        $data['state_details'] = State::where('id',$id)->first();
        return view('state.edit',$data);
    }


    public function update(Request $request, $id)
    {

        $check_state = State::where(['name' => $request->name,'created_by' => Auth::user()->id])->where('id','!=',$id)->first();
        $check_state_code = State::where(['code' => $request->code,'created_by' => Auth::user()->id])->where('id','!=',$id)->first();
        if($check_state){
            return redirect()->back()->withInput()->with('error', 'This state name already exist.');
        }    
        elseif ($check_state_code) {
            return redirect()->back()->withInput()->with('error', 'This state code already exist.');
        }
        else{
            $state = State::find($id);
            $state->country_id = $request->country;
            $state->name = $request->name;
            $state->code = isset($request->code) ? $request->code:0;
            $state->updated_by = Auth::user()->id;
            $state->save();
            return redirect()->route('state.index')->with('success', 'State added successfully.');    
        }
    }

    public function destroy($id)
    {
        State::where('id',$id)->delete();
        return redirect()->route('state.index')->with('success', 'State deleted successfully.');
    }


    public function load_autocomplete(request $request)
    {   
        $response=[];
        $state_detail=State::where('name', 'like', '%' . $request['query'] . '%')->where('created_by',Auth::user()->id)->get();
        

        if(count($state_detail) > 0)
        {
            foreach ($state_detail as $value) {
                $response[] = array("value"=>$value->name,"data"=>$value->name);
            }   
        }
        return json_encode(array("suggestions" => $response));

    }
}
