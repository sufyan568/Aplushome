<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Client;
use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approveclients = DB::table('clients')
        ->select('*')
        ->where('approved', 1)
        ->orderBy('clients.id', 'DESC')
        ->get();
        $unapprovedclients = DB::table('clients')
         ->join('intakecordinator','intakecordinator.id','=','clients.intake_Co')
        ->select('intakecordinator.intake_name', 'clients.*')      
        ->where('clients.approved', 0)
         ->orderBy('clients.id', 'DESC')
        ->get();
        $activecaregivers = DB::table('caregivers')
        ->select('*')
        ->where('status', 1)
        ->get();
         $totalclients = DB::table('clients')
        ->select('*')
        ->count();  
         $deactivate = DB::table('clients')
        ->join('caregivers','caregivers.id','=','clients.caregiver_id')
        ->select('caregivers.name', 'clients.*')
        ->where('clients.status', 0)
        ->get();  

         $data= DB::table('clients')
        //->join('caregivers','caregivers.id','=','clients.caregiver_id')
        //->select('caregivers.name', 'clients.*')
          ->orderBy('id', 'DESC')
         ->select('*')
          ->get();

          $newlyadded= DB::table('clients')
          ->select('*')
          ->orderBy('id', 'DESC')
          ->get();
          
          $newreferral   = DB::table('clients') ->select('*')->where('approved',0)->count();

    Session::put('referrals',$newreferral);
        return view('/clients/client',compact('approveclients','totalclients','deactivate','activecaregivers','data','unapprovedclients','newlyadded'));
    }

    public function addclient(Request $request)
    {
    $validator = Validator::make($request->all(), [

           'email' => 'required|unique:clients'

        ]);
       if ($validator->fails()) {

        return back()->with('message','Email must be unique');
        }

        if ($request->hasFile('image')) 
        {
        $extension=$request->image->extension();
        $filename=time()."_.".$extension;
        $request->image->move(public_path('clients'),$filename);
        
        }

       if ($request->type == 'system')
       {      
        
         $data = array('client_name' => $request->name,
        'email' => $request->email,
         'gender' => $request->gender,
        'phone' => $request->phone,
        'payroll' => $request->payroll,
        'address' => $request->address,
        'caregiver_id' => $request->caregiver_id,
        'status' => $request->status,
        'location' => $request->location,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
        'classification' => $request->classification,
        'approved' => 1,
        'client_task' => $request->client_task,
        'type' => $request->type,
        'image' => $filename);
       }
       else{
        $data = array('client_name' => $request->name,
        'email' => $request->email,
         'gender' => $request->gender,
        'phone' => $request->phone,
        'payroll' => $request->payroll,
        'address' => $request->address,
        'caregiver_id' => $request->caregiver_id,
        'status' => $request->status,
        'location' => $request->location,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
        'classification' => $request->classification,
        'approved' => 1,
        'client_task' => $request->client_task,
        'type' => $request->type
       );

       }

      DB::table('clients')->insert($data);  

        return back();

    }

     
    public function clientdetail($id){

        $details = DB::table('clients')->select('*')->where('id',$id)->first();
        return view('/clients/profiledetail',compact('details'));
   }

    public function deactivate(Request $request){
        $id=$request->id;
        $deactivate = DB::table('clients')->where('id', $id)->update(['status' => 0]);
        return redirect('/client');
    }

public function clientdetailfull($id){

        $details = DB::table('clients')->select('*')->where('id',$id)->first();
        $activecaregivers = DB::table('caregivers')->select('*')->where('status', 1)->get();
        $schedule= DB::table('schedule')->join('clients','clients.id','=','schedule.client_id')
        ->join('caregivers','caregivers.id','=','schedule.caregiver_id')->select('caregivers.*', 'schedule.*')->where('schedule.client_id',$id)->get();
        $data= DB::table('caregivers')
        ->select('*')
        ->get();
        return view('/clients/userprofile',compact('details','schedule','activecaregivers','data'));
    }

    public function updateclientprofile(Request $request){
        $id=$request->id;
       $oldimage = $request->image;
        if ($request->hasFile('image')) 
        {
        $extension=$request->image->extension();
        $filename=time()."_.".$extension;
        $request->image->move(public_path('clients'),$filename);
        
        }   

        else{
            $filename = $oldimage;
        } 
        $update = DB::table('clients')
        ->where('id', $id)
        ->update(['client_name' => $request->name,
                   'email' => $request->email,
                    'gender' =>$request->gender,
                   'phone' => $request->phone,
                   'address' => $request->address,
                   'classification' => $request->classification,
                   'status' => $request->status,
                   'commision' => $request->commision,
                   'payroll' =>$request->payroll,
                   'image' => $filename
                   ]);

        return redirect('/client');
    }
    public function clientprofileapprove($id){

        $details = DB::table('clients')->select('*')->where('id',$id)->first();
        $intakeId = $details->intake_Co;
        $referby = DB::table('intakecordinator')->select('*')->where('id',$intakeId)->first();
        return view('/clients/clientprofileapprove',compact('details','referby'));

    }
    public function approveclient(Request $request){
            $id = $request->id;
            $update = DB::table('clients')->where('id', $id)
            ->update(['client_name' => $request->client_name,
            'email' => $request->email,
            'payroll' =>$request->payroll,
            'phone' => $request->phone,
            'address' => $request->address,
            'commision' => $request->commision,
            'startdate' => $request->startdate,
            'approved' => 1
            ]);
            $data = array('title' => 'Client profile approved',
            'description' => 'Admin  approved your client '.$request->client_name.' profile',
            'type' =>'clientapproval',
            'from' => 'admin',
            'to' => 'intakeCordinator',
            'admin' =>Auth::user()->id,
            'intakeco_id' =>$request->intakeco_id,
            'client_id' =>$id,
            'status' =>1,
            'date' =>date('Y-m-d '),
            'time' => date('H:i:s')

            );
            DB::table('notifications')->insert($data);     
               return redirect('/client')->with('message','Client Approved Sucessfully');
   } 

    public function removeprofile($id){
          $details = DB::table('clients')->select('*')->where('id',$id)->first();
          $intakeco_id =$details->intake_Co;
          $data = array('title' => 'Client profile removed',
          'description' => 'Admin didnot approve your client '.$details->client_name.' profile',
          'type' =>'clientapproval',
          'from' => 'admin',
          'to' => 'intakeCordinator',
          'admin' =>Auth::user()->id,
          'intakeco_id' =>$intakeco_id,
          'client_id' =>$id,
          'status' =>0,
          'date' =>date('Y-m-d '),
          'time' => date('H:i:s')
           );
          DB::table('notifications')->insert($data); 
        $result = DB::table('clients')->select('*')->where('id', $id)->delete();
        return redirect('/client')->with('message','Client Removed Sucessfully');
               
  
    }

    public function homeassesment(Request $request){
          
          $id=$request->client_id;
          $home = DB::table('home_assessment')->select('*')->where('client_id', $id)->first();
          if($home){
           $update = DB::table('home_assessment')->where('client_id', $id)
          ->update(['client_id' => $request->client_id,
          'description' => $request->description,
          'installation' =>$request->installation,
          'escape_plan' => $request->escape_plan,
          'fine' => $request->fine,
          'lighting' => $request->lighting,
          'others' => $request->others
           ]);
             return redirect('/client');
          }
          else{
        $data = array('client_id' => $request->client_id,
        'description' => $request->description,
        'installation' =>$request->installation,
        'escape_plan' => $request->escape_plan,
        'fine' => $request->fine,
        'lighting' =>$request->lighting,
        'others' =>$request->others,
        'created_at' =>date('Y-m-d'),
        );
        DB::table('home_assessment')->insert($data); 
        return redirect('/client');
          }
         

    } 

    public function mco(Request $request){
          
          $id=$request->client_id;
          $mco = DB::table('mco')->select('*')->where('client_id', $id)->first();
          if($mco){
           $update = DB::table('mco')->where('client_id', $id)
          ->update(['client_id' => $request->client_id,
          'intakeco_name' => $request->intakeco_name,
          'date' =>$request->date,
          'phone' => $request->phone]);
             return redirect('/client');
          }
          else{
        $data = array('client_id' => $request->client_id,'intakeco_name' => $request->intakeco_name,
        'date' =>$request->date,'phone' => $request->phone,'created_at' =>date('Y-m-d'));
        DB::table('mco')->insert($data); 
        return redirect('/client');
          }
         

    } 

           public function deleteclient($id)
        {

        $client=Client::find($id);
        $deleted = $client->delete();
 
        if ($deleted) 
        {
        return redirect('/client')->with ('message', 'Client successfully deleted!');
        }
    
    
    
}
}



