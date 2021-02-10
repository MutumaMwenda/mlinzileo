<?php

namespace App\Http\Controllers;
use App\Incidence;
use Auth;
use DB;
use Mail;

use Illuminate\Http\Request;

class IncidenceController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
    	$incidences = Incidence::paginate(5);
     // dd($incidences);
    	return view('incidence_index',compact('incidences'));
    }

    public function create(){

    	return view('incidence_create');

    }

    public function store(Request $request){
    	$this->validate($request,[
    	'camera_location' => 'required'
    	
    	]);

    	$mhs = new Incidence;
    	$mhs->camera_location = $request->camera_location;    	
    	$mhs->save();
       IncidenceController:: send_html_email_to_personnel($request->all());
        IncidenceController:: send_html_email_to_station($request->all());
    	return redirect(route('incidence_index'))->with('successMsg','Incidence reported succesfully');

    }

    public function edit($id){
    	$incidence = Incidence::find($id);
    	return view('incidence_edit',compact('incidence'));
    }

    public function update(Request $request, $id){
		$this->validate($request,[
    	'camera_location' => 'required'
    	
    	]);

    	$mhs = Incidence::find($id);
    	$mhs->camera_location = $request->camera_location;
    	
    	$mhs->save();
    	return redirect(route('incidence_index'))->with('successMsg','Incidence updated successfully');
    }

    public function delete($id){

        Incidence::find($id)->delete();
        return redirect(route('incidence_index'))->with('successMsg','Incidence deleted successfully');
    }
            public  function send_html_email_to_personnel(array $data) {

        // $userId = Auth::id();
        $camera_location=$data['camera_location'];

        $activepersonnel = DB::table('personnels')->where('on_duty',1)->first();
         
         
        //$userId = Auth::id();
      // $requester = DB::table('users')->where('id', $currentrequest->User_ID)->first();

    
     $text='This is to report and emergecy incident.Our camera located at '.$camera_location.' has detected unwanted/harmful devices.Please respond promptly!';
     $messages=$text;
      $data = array('name'=> $activepersonnel->name,'messages'=> $messages);
//dd($researchowner->email);
      Mail::send('mail', $data, function($message) use ($activepersonnel) {
         $message->to($activepersonnel->email, $activepersonnel->name)->subject
            ('Incident Occurrence');
         $message->from('sirianmwenda@gmail.com','Mlinzileo');
      });
     // echo "HTML Email Sent. Check your inbox.";
   }

        public  function send_html_email_to_station(array $data) {

        // $userId = Auth::id();
        $camera_location=$data['camera_location'];

        $activestation = DB::table('stations')->where('is_operational',1)->first();
         
         
        //$userId = Auth::id();
      // $requester = DB::table('users')->where('id', $currentrequest->User_ID)->first();

    
     $text='This is to report and emergecy incident.Our camera located at '.$camera_location.' has detected unwanted/harmful devices.Please respond promptly!';
     $messages=$text;
      $data = array('name'=> $activestation->name,'messages'=> $messages);
//dd($researchowner->email);
      Mail::send('mail_station', $data, function($message) use ($activestation) {
         $message->to($activestation->email, $activestation->name)->subject
            ('Incident Occurrence');
         $message->from('sirianmwenda@gmail.com','Mlinzileo');
      });
     // echo "HTML Email Sent. Check your inbox.";
   }
}
