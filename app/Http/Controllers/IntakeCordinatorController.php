<?php

namespace App\Http\Controllers;

use App\IntakeCordinator;
use Illuminate\Http\Request;
use DB;
use Validator;

class IntakeCordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        
         $activeclients = DB::table('clients')
        ->select('*')
        ->where('status', 1)
        ->get();


         $activecaregivers = DB::table('caregivers')
        ->select('*')
        ->where('status', 1)
        ->get();

         $activeintakeco = DB::table('intakecordinator')
         ->where('status', 1)
        ->select('*')
        ->get();

         $totalintakecordinator = DB::table('intakecordinator')
        ->select('*')
        ->count();  

         $deactivated = DB::table('intakecordinator')
         /*->join('clients','clients.id','=','intakecordinator.client_id')
        ->join('caregivers','caregivers.id','=','intakecordinator.caregiver_id')
        ->select('clients.client_name', 'caregivers.name','intakecordinator.*')*/
        ->select('*')
        ->where('status', 0)
        ->get();  

        $data= DB::table('intakecordinator')
/*        ->join('clients','clients.id','=','intakecordinator.client_id')
*/        ->join('caregivers','caregivers.id','=','intakecordinator.caregiver_id')
        ->select('caregivers.name','intakecordinator.*')
        ->get();

        
        return view('/intakeCo/intakecordinator',compact('activeclients','totalintakecordinator','data','activecaregivers','deactivated','activeintakeco'));
     
    }

     public function addintakeCordinator(Request $request)
    {

         $validator = Validator::make($request->all(), [

           'email' => 'required|unique:intakecordinator'

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
         $email = $request->email;
         $password =$request->password;         
         $data = array('intake_name' => $request->name,
        'email' => $request->email,
        'gender' => $request->gender,
        'intakeco_payroll' => $request->intakeco_payroll,
        'password' => $request->password,
        'phone' => $request->phone,
        'address' => $request->address,
        'client_id' => $request->client_id,
        'caregiver_id' => $request->caregiver_id,

        'status' => $request->status,
        'location' => $request->location,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
        'classification' => $request->classification,

        'image' => $filename);  

      DB::table('intakecordinator')->insert($data);  

     MailController::intakecoSendPassword($email,$password);
       return back();

    }

    public function intakecoprofiledetails($id){

         $details = DB::table('intakecordinator')
        ->select('*')
        ->where('id',$id)
        ->first();
       
       $activeclients = DB::table('clients')
        ->select('*')
        ->where('status', 1)
        ->get();

         $caregivers = DB::table('caregivers')
        ->select('*')
        ->where('status', 1)
        ->get();


        $schedule= DB::table('meetings')
        ->join('clients','clients.id','=','meetings.client_id')
        ->join('intakecordinator','intakecordinator.id','=','meetings.intakeco_id')
        ->select('clients.*', 'meetings.*')
         ->where('meetings.intakeco_id',$id)
        ->get();
return view('/intakeCo/userprofile',compact('details','schedule','activeclients','caregivers'));

    }

    public function updateintakecoprofile(Request $request){
      
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
        $update = DB::table('intakecordinator')
        ->where('id', $id)
        ->update(['intake_name' => $request->name,
                   'email' => $request->email,
                   'client_id' => $request->client_id,
                   'caregiver_id' => $request->caregiver_id,
                   'gender' =>$request->gender,
                   'phone' => $request->phone,
                   'address' => $request->address,
                   'classification' => $request->classification,
                   'status' => $request->status,
                   'intakeco_payroll' => $request->intakeco_payroll,
                   'image' => $filename
                   ]);

               return redirect('/intakeCordinator');
    
}


         public function deleteintakeCordinator($id)
        {

        $deleteintakeCordinator=IntakeCordinator::find($id);
        
        $deleted = $deleteintakeCordinator->delete();
          $surveycount = DB::table('messages')
         ->where('intakeco_id', $id)
        ->delete();
        if ($deleted) 
        {
        return redirect('/intakeCordinator')->with ('message', 'intake Coordinator successfully deleted!');
        }
    

   
}



}
