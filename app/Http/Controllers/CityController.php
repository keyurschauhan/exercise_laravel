<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Auth;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $city = City::where('created_by',Auth::user()->id)->paginate(10);
        $city->appends($request->all())->render();
        $data['city'] = $city;
        return view('city.index',$data);
    }


    public function create()
    {
        $data['state_list'] = State::where('created_by',Auth::user()->id)->get();
        return view('city.create',$data);
    }


    public function store(Request $request)
    {
        $check_city = City::where(['name' => $request->name,'created_by' => Auth::user()->id])->first();
        if($check_city){
            return redirect()->back()->withInput()->with('error', 'This city name already exist.');
        }
        else{
            $city = new City;
            $city->state_id = $request->state;
            $city->name = $request->name;
            $city->created_by = Auth::user()->id;
            $city->save();
            return redirect()->route('city.index')->with('success', 'City added successfully.');    
        }
    }


    public function show($id)
    {
        $data['city_details'] = City::where('id',$id)->first();
        return view('city.show',$data);
    }


    public function edit($id)
    {
        $data['state_list'] = State::where('created_by',Auth::user()->id)->get();
        $data['city_details'] = City::where('id',$id)->first();

        return view('city.edit',$data);
    }


    public function update(Request $request, $id)
    {

        $check_city = City::where(['name' => $request->name,'created_by' => Auth::user()->id])->where('id','!=',$id)->first();
        if($check_city){
            return redirect()->back()->withInput()->with('error', 'This city name already exist.');
        }
        else{
            $city = City::find($id);
            $city->state_id = $request->state;
            $city->name = $request->name;
            $city->updated_by = Auth::user()->id;
            $city->save();
            return redirect()->route('city.index')->with('success', 'City updated successfully.');    
        }
    }


    public function destroy($id)
    {
        State::where('id',$id)->delete();
        return redirect()->route('city.index')->with('success', 'State deleted successfully.');
    }


    public function load_autocomplete(request $request)
    {   
        $response=[];
        $city_detail=City::where('name', 'like', '%' . $request['query'] . '%')->where('created_by',Auth::user()->id)->get();
        

        if(count($city_detail) > 0)
        {
            foreach ($city_detail as $value) {
                $response[] = array("value"=>$value->name,"data"=>$value->name);
            }   
        }
        return json_encode(array("suggestions" => $response));

    }

    public function getStateData(Request $request){
        $get_details = State::where('id',$request->state_id)->first();
        $code = null;$country_nm=null;
        if($get_details){
            if(!empty($get_details->code)){ $code = $get_details->code; }
            $country_nm = $get_details->country->name;
        }
        $data=['code' => $code,'country' => $country_nm];
        return response()->json($data);
    }
}
