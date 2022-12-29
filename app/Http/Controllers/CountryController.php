<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Auth;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $country = Country::where('created_by',Auth::user()->id)->paginate(10);
        $country->appends($request->all())->render();
        $data['country'] = $country;
        return view('country.index',$data);
    }

    public function create()
    {
        return view('country.create');
    }

    public function store(Request $request)
    {
        $check_country = Country::where(['name' => $request->name,'created_by' => Auth::user()->id])->first();
        if($check_country){
            return redirect()->back()->withInput()->with('error', 'This country name already exist.');
        }    
        else{
            $country = new Country;
            $country->name = $request->name;
            $country->created_by = Auth::user()->id;
            $country->save();
            return redirect()->route('country.index')->with('success', 'Country added successfully.');    
        }
        
    }

    public function show($id)
    {
        $data['country_details'] = Country::where('id',$id)->first();
        return view('country.show',$data);
    }

    public function edit($id)
    {
        $data['country_details'] = Country::where('id',$id)->first();
        return view('country.edit',$data);
    }

    public function update(Request $request, $id)
    {

        $check_country = Country::where(['name' => $request->name,'created_by' => Auth::user()->id])->where('id','!=',$id)->first();
        if($check_country){
            return redirect()->back()->with('error', 'This country name already exist.');
        }    
        else{
            $country = Country::find($id);
            $country->name = $request->name;
            $country->updated_by = Auth::user()->id;
            $country->save();
            return redirect()->route('country.index')->with('success', 'Country updated successfully.');    
        }
    }

    public function destroy($id)
    {
        Country::where('id',$id)->delete();
        return redirect()->route('country.index')->with('success', 'Country deleted successfully.');
    }

    public function load_autocomplete(request $request)
    {   
        $response=[];
        $country_detail=Country::where('name', 'like', '%' . $request['query'] . '%')->where('created_by',Auth::user()->id)->get();
        

        if(count($country_detail) > 0)
        {
            foreach ($country_detail as $value) {
                $response[] = array("value"=>$value->name,"data"=>$value->name);
            }   
        }
        return json_encode(array("suggestions" => $response));

    }

}
