<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Caregiver;
use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Carbon;
use Auth;
class CaregiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
 $activeclients = DB::table('clients')->select('*')->where('status', 1)->where('approved', 1)->get();
 $activeintakeco = DB::table('intakecordinator')->select('*')->where('status', 1)->get();
 $totalcaregivers = DB::table('caregivers')->select('*')->count();  
 $all= DB::table('caregivers')->select('*')->orderBy('id', 'DESC')->get();
 $approved= DB::table('caregivers')->select('*')->where('approved',1)->orderBy('id', 'DESC')->get(); 
 $unapproved= DB::table('caregivers')->select('*')->where('approved',0)->orderBy('id', 'DESC')->get();        
 $newlyadded = DB::table('caregivers')->select('*')->where('approved',1)->orderBy('id', 'DESC')->whereDate('created_at', Carbon::now()->subDays(7))->get();   
 
 $newcaregiver   = DB::table('caregivers') ->select('*')->where('approved',0)->count();
         Session::put('newcaregivers',$newcaregiver);
 return view('/caregiver/caregiver',compact('activeclients','totalcaregivers','all','activeintakeco','approved','unapproved','newlyadded'));
     
   
    }

     public function addcaregiver(Request $request)
    {

        $validator = Validator::make($request->all(), [

           'email' => 'required|unique:caregivers'

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
          $email=$request->email;
        $password=$request->password;

         $data = array('name' => $request->name,
        'email' => $request->email,
        'gender' => $request->gender,
        'phone' => $request->phone,
        'address' => $request->address,
        'client_id' => $request->client_id,
        'intakeco_id' => $request->intakeco_id,
        'caregiver_payroll' => $request->caregiver_payroll,
        'status' => $request->status,
        'location' => $request->location,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
        'classification' => $request->classification,
        'password' => $request->password,
        'approved' => 1,

        'image' => $filename);
 

      DB::table('caregivers')->insert($data);  
 MailController::intakecoSendPassword($email,$password);  

        return back();

    }
public function caregiverprofiledetails($id){

        $details = DB::table('caregivers')
        ->join('intakecordinator','intakecordinator.id','=','caregivers.intakeco_id')
        ->select('intakecordinator.*', 'caregivers.*')
        ->where('caregivers.id',$id)
        ->first();
       
       $activeclients = DB::table('clients')
        ->select('*')
        ->where('status', 1)
        ->get();

         $activeintakeco = DB::table('intakecordinator')
        ->select('*')
        ->where('status', 1)
        ->get();

        $notes = DB::table('caregiver_notes')
        ->select('*')
        ->where('caregiver_id', $id)
        ->get();
$certificates = DB::table('certificates')
        ->select('*')
        ->where('caregiver_id', $id)
        ->get();
        
        $surveycount = DB::table('surveyresult')
        ->select('*')
        ->where('caregiver_id', $id)
        ->count();

        $schedule= DB::table('schedule')
        ->join('clients','clients.id','=','schedule.client_id')
        ->join('caregivers','caregivers.id','=','schedule.caregiver_id')
        ->select('clients.*', 'schedule.*')
         ->where('schedule.caregiver_id',$id)
        ->get();

        return view('/caregiver/userprofile',compact('details','schedule','activeclients','activeintakeco','notes','certificates','surveycount'));

    }
   public function updatecaregiverprofile(Request $request){

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
        $update = DB::table('caregivers')
        ->where('id', $id)
        ->update(['name' => $request->name,
                   'email' => $request->email,
                   'gender' =>$request->gender,
                   'phone' => $request->phone,
                   'address' => $request->address,
                   'classification' => $request->classification,
                   'status' => $request->status,
                   'caregiver_payroll'=>$request->caregiver_payroll,
                    'intakeco_id'=>$request->intakeco_id,
                    'address'=>$request->address,
                    'longitude'=>$request->longitude,
                    'latitude'=>$request->latitude,


                   'image' => $filename
                   ]);

        return redirect('/caregiver');
    

   }
      public function unapproved($id){
        $details = DB::table('caregivers')->select('*')->where('id',$id)->first();
        return view('caregiver/unapproved',compact('details'));
    } 
    public function caregiverprofileremove(Request $request){
                  $id = $request->id;
          $details = DB::table('caregivers')->select('*')->where('id',$id)->first();
           $data = array('title' => 'Profile not approved',
          'description' => 'Admin did not approve your profile',
          'type' =>'caregiverapproval',
          'from' => 'admin',
          'to' => 'caregiver',
          'description' => 'Admin  Reject your profile & notice from admin is '.$request->message,
          'admin' =>Auth::user()->id,
          'caregiver_id' =>$id,
          'status' =>0,
          'date' =>date('Y-m-d '),
          'time' => date('H:i:s')
           );
          DB::table('notifications')->insert($data); 
        $result = DB::table('caregivers')->select('*')->where('id', $id)->delete();
        return redirect('/caregiver');
               
  
    }
    public function caregiverprofileapprove($id){
        $details = DB::table('caregivers')->select('*')->where('id',$id)->first();
        return view('caregiver/caregiverprofileapprove',compact('details'));
    }  
    
    public function profileapprovestatus(Request $request){
            $id = $request->id;
            $update = DB::table('caregivers')->where('id', $id)
            ->update(['approved' => 1]);
            $data = array('title' => 'Caregiver profile approved',
            'description' => 'Admin  approved your profile & notice from admin is '.$request->message,
            'type' =>'caregiverapproval',
            'from' => 'admin',
            'to' => 'caregiver',
            'admin' =>Auth::user()->id,
            'caregiver_id' =>$id,
            'status' =>1,
            'date' =>date('Y-m-d '),
            'time' => date('H:i:s')

            );
            DB::table('notifications')->insert($data);     
               return redirect('/caregiver');

    } 


    public function approvepayroll($id){
        $notificationsId = DB::table('notifications')->where('id', $id)->select('*')->first();
        $caregiver_id=$notificationsId->caregiver_id;
        $notifications = DB::table('caregivers')->where('id', $caregiver_id)->select('*')->first();    
        return view('caregiver.approvepayroll',compact('notifications','id'));
    }

  public function caregiverincreasepayroll(Request $request){
        $update = DB::table('caregivers')->where('id', $request->payrollid)->update([
        'caregiver_payroll' => $request->caregiver_payroll]);

        $id=$request->caregiver_id;
        $caregiver = DB::table('caregivers')
        ->select('*')
        ->where('id', $id)
        ->first();
        $name= $caregiver->name;
        $data = array('title' => 'Admin Update Your Payroll Request',
        'description' =>'Admin update  '.$request->caregiver_payroll.' in your payroll ',
        'type' =>'caregiverpayrollrequest',
        'from' => 'admin',
        'to' => 'caregiver',
        'admin' =>3,
        'caregiver_id' =>$request->caregiver_id,
        'date' =>date('Y-m-d '),
        'time' => date('H:i:s')
        );

        DB::table('notifications')->insert($data);
        $update = DB::table('notifications')->where('id', $request->notificationid)->update(['deactivate' => 1]);
        return redirect('/home');  
        }

    
    
    
         public function deletecaregiver($id)
        {

        $deletecaregiver=Caregiver::find($id);
        $deleted = $deletecaregiver->delete();
        $surveycount = DB::table('caregiversms')
         ->where('caregiver_id', $id)
        ->delete();

        if ($deleted) 
        {
        return redirect('/caregiver')->with ('message', 'Caregiver successfully deleted!');
        }
    
    
    
      }
    
    
    
    
}
