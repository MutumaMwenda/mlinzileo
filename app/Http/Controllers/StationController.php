<?php

namespace App\Http\Controllers;
use App\Station;

use Illuminate\Http\Request;

class StationController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
    	$stations = Station::paginate(5);
    	return view('station_index',compact('stations'));
    }

    public function create(){

    	return view('station_create');

    }

    public function store(Request $request){
    	$this->validate($request,[
    	'name' => 'required',
    	'contact' => 'required',
    	'email' => 'required'
    	]);

    	$mhs = new Station;
    	$mhs->name = $request->name;
    	$mhs->contact = $request->contact;
    	$mhs->email = $request->email;
    	$mhs->is_operational = 1;
    	$mhs->save();
    	return redirect(route('station_index'))->with('successMsg','Station saved succesfully');

    }

    public function edit($id){
    	$station = Station::find($id);
    	return view('station_edit',compact('station'));
    }

    public function update(Request $request, $id){
		$this->validate($request,[
    	'name' => 'required',
    	'contact' => 'required',
    	'email' => 'required'
    	]);

    	$mhs = Station::find($id);
    	$mhs->name = $request->name;
    	$mhs->contact = $request->contact;
    	$mhs->email = $request->email;
    	$mhs->save();
    	return redirect(route('station_index'))->with('successMsg','Station updated successfully');
    }

    public function delete($id){

        Station::find($id)->delete();
        return redirect(route('station_index'))->with('successMsg','Station deleted successfully');
    }
}
