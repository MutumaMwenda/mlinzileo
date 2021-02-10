<?php

namespace App\Http\Controllers;
use App\Personnel;

use Illuminate\Http\Request;

class PersonnelController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
    	$personnel = Personnel::paginate(5);
    	return view('personnel_index',compact('personnel'));
    }

    public function create(){

    	return view('personnel_create');

    }

    public function store(Request $request){
    	$this->validate($request,[
    	'name' => 'required',
    	'contact' => 'required',
    	'email' => 'required'
    	]);

    	$mhs = new Personnel;
    	$mhs->name = $request->name;
    	$mhs->contact = $request->contact;
    	$mhs->email = $request->email;
    	$mhs->on_duty = 1;
    	$mhs->save();
    	return redirect(route('personnel_index'))->with('successMsg','Personnel saved succesfully');

    }

    public function edit($id){
    	$personnel = Personnel::find($id);
    	return view('personnel_edit',compact('personnel'));
    }

    public function update(Request $request, $id){
		$this->validate($request,[
    	'name' => 'required',
    	'contact' => 'required',
    	'email' => 'required'
    	]);

    	$mhs = Personnel::find($id);
    	$mhs->name = $request->name;
    	$mhs->contact = $request->contact;
    	$mhs->email = $request->email;
    	$mhs->save();
    	return redirect(route('personnel_index'))->with('successMsg','Personnel updated successfully');
    }

    public function delete($id){

        Personnel::find($id)->delete();
        return redirect(route('personnel_index'))->with('successMsg','Personnel deleted successfully');
    }
}
