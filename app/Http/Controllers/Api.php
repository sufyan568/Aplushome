<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\IntakeCordinator;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Client;
use App\Http\Controllers\MailController;


class Api extends Controller
{

public $successStatus = 200;




public function editmeeting(Request $request,$id){

$meeting_id = DB::table('meetings')
->select('*')
->where('id',$id)
->first();

$intakeco_id=$meeting_id->intakeco_id;
$details = DB::table('intakecordinator')
->select('*')
->where('id',$intakeco_id)
->first();

$name= $details->intake_name;
if($meeting_id)
{
$data = array(
'status' => $request->status,
'date' => $request->date
);


if($data)
{
$id = $meeting_id->id;
$update = DB::table('meetings')
->where('id', $id)
->update([
'status' => $request->status,
'date' => $request->date
]);


$data = array('title' => 'Lead Funnel Status Update',
'description' => $name.'has updated the Waiver',
'type' =>'leadfunnel',
'from' => 'intakeCordinator',
'to' => 'admin',
'intakeco_id' =>$intakeco_id,
'date' =>date('Y-m-d '),
'time' => date('H:i:s')
);
DB::table('notifications')->insert($data);

return response()->json(['success' => 'Meeting Updated Succesfully'], $this-> successStatus);
}
else
{
return response()->json(['error'=>'Fill all the fields'], 401);
}

}
else
{
return response()->json(['error'=>'No Meeting Found'], 401);
}


}


public function payrollrequest(Request $request)
{

$data = array('title' => 'IntakeCordinator Payroll Request',
'description' => ' wants to increase in payroll ',
'type' =>'payrollrequest',
'from' => 'intakeCordinator',
'to' => 'admin',
'payroll' => $request->payroll,
'admin' =>3,
'intakeco_id' =>$request->intakeco_id,
'date' =>date('Y-m-d '),
'time' => date('H:i:s')
);

DB::table('notifications')->insert($data);
return response()->json(['success'=>'Your Payroll Request Send Sucessfully'], $this-> successStatus);

}

public function addcaregiver(Request $request)
{

$data = array('name' => $request->name,
'last_name' => $request->last_name,
'middle_name' => $request->middle_name,
'address' => $request->address,
'address_line2' => $request->address_line2,
);

DB::table('caregivers')->insert($data);

		$id = DB::getPdo()->lastInsertId();
			$caregiver = DB::table('caregivers')
					->select('*')
					->where('id', $id)
					->first();

			$data = array('title' => 'Caregiver Added',
						'description' => ' IntakeCordinator Added this caregiver ' .$request->name,
						'type' =>'caregiveradded',
						'from' => 'intakecordinator',
						'to' => 'admin',
						'admin' =>3,
						'caregiver_id' =>$caregiver->id,
						'date' =>date('Y-m-d '),
						'time' => date('H:i:s')
						);

			DB::table('notifications')->insert($data);

return response()->json(['success'=>'Caregiver Added Succesfully'], $this-> successStatus);
}



public function addclient(Request $request)
{
    $validator = Validator::make($request->all(), [

'email' => 'required|email|unique:clients',

]);
if ($validator->fails()) {
return response()->json(['error'=>$validator->errors()], 401);
}

if ($request->hasFile('image')) 
        {
        $extension=$request->image->extension();
        $filename=time()."_.".$extension;
        $request->image->move(public_path('clients'),$filename);
        
        $data = array('client_name' => $request->name,
		'email' => $request->email,
		'gender' => $request->gender,
		'phone' => $request->phone,
		'payroll' => $request->payroll,
		'client_task' => $request->client_task,
		'classification' => $request->classification,
		'address' => $request->address,
		'intake_Co' => $request->intake_Co,
		'longitude' => $request->longitude,
		'latitude' => $request->latitude,
		'type' =>'referral',
		'created_at' =>date('Y-m-d'),
		'image' => $filename,

		);

        }   

else
{
	$data = array('client_name' => $request->name,
	'email' => $request->email,
	'gender' => $request->gender,
	'phone' => $request->phone,
	'payroll' => $request->payroll,
	'client_task' => $request->client_task,
	'classification' => $request->classification,
	'address' => $request->address,
	'intake_Co' => $request->intake_Co,
	'type' =>'referral',
	'created_at' =>date('Y-m-d'),
	);
}


DB::table('clients')->insert($data);
$notification = array('title' => 'New Referral',
'description' => 'New Client '.$request->client_name.' Added',
'type' =>'newreferral',
'from' => 'intakeCordinator',
'to' => 'admin',
'intakeco_id' =>$request->intake_Co,
'status' =>1,
'date' =>date('Y-m-d '),
'time' => date('H:i:s')
);
 DB::table('notifications')->insert($notification); 

return response()->json(['success'=>'Client Added Succesfully'], $this-> successStatus);
}



public function clientdetail($id)
{
$details = DB::table('clients')
->select('*')
->where('id',$id)
->first();
$schedule = DB::table('schedule')
->select('*')
->where('client_id',$id)
->first();
return response()->json(['clientdetails' => $details,$schedule], $this-> successStatus);

}

public function addschedule(Request $request){

$data = array('client_id' => $request->client_id,
'caregiver_id' => $request->caregiver_id,
'intakeco_id' => $request->intakeco_id,
'timeStart' => $request->timeStart,
'timeEnd' => $request->timeEnd,
'date' => $request->date,
'created_at' =>date('Y-m-d'),
);


if($data)
{
DB::table('schedule')->insert($data);
$intakecordinator = DB::table('intakecordinator')
					->select('*')
					->where('id', $request->intakeco_id)
					->first();
					$name = $intakecordinator->intake_name;

			$data = array('title' => 'Schedule Added',
						'description' => ' IntakeCordinator ' .$name. ' Added a schedule ',
						'type' =>'scheduleadded',
						'from' => 'intakecordinator',
						'to' => 'admin',
						'admin' =>3,
						'intakeco_id' =>$intakecordinator->id,
						'date' =>date('Y-m-d '),
						'time' => date('H:i:s')
						);

			DB::table('notifications')->insert($data);

return response()->json(['success' => 'Schedule Added Succesfully'], $this-> successStatus);
}
else
{
return response()->json(['error'=>'Fill all the fields'], 401);
}

}

public function getclients($id)
{
$clients = DB::table('clients')
->select('*')
->where('intake_Co',$id)
->get();
return response()->json(['success' => $clients], $this-> successStatus);
}


public function getcaregivers($id)
{
$caregivers = DB::table('caregivers')
->select('*')
->where('intakeco_id',$id)
->get();
return response()->json(['success' => $caregivers], $this-> successStatus);
}

public function intakelogin(Request $request){

$validator = Validator::make($request->all(), [

'email' => 'required|email',
'password' => 'required',

]);
if ($validator->fails()) {
return response()->json(['error'=>$validator->errors()], 401);
}
$email = $request->email;
$password = $request->password;

$intakeco = DB::table('intakecordinator')
->select('*')
->where('email', $email)
->first();
$registeredEmail=$intakeco->email;
$registeredpwd=$intakeco->password;
$id['IntakeCordinator_Id']=$intakeco->id;


if($registeredEmail){

if($registeredpwd == $password){
return response()->json(['Login success' => $id,$intakeco], $this-> successStatus);
}
else{
return response()->json(['error'=>'Invalid Username and Password'], 401);

}

}
else{
return response()->json(['error'=>'Invalid Username and Password'], 401);

}
}


public function resetpassword(Request $request){



$email=$request->email;


$result = DB::table('intakecordinator')
->select('*')
->where('email', $email)
->first();
if($result != null){
$id =$result->id;
MailController::resetPasswordApp($email,$id);
return response()->json(['success'=>'Please check your email To verify Otp code'], $this-> successStatus);

}
else
{
return response()->json(['error'=>'No User Found'], 401);
}
}
public function intakeupdatepassword(Request $request,$id)
{

$intakeco = IntakeCordinator::find($id);
if($intakeco)
{
$validator = Validator::make($request->all(), [
'password' => 'required',
'c_password' => 'required|same:password',

]);
if ($validator->fails()) {
return response()->json(['error'=>$validator->errors()], 401);
}
$input = $request->all();
$update = DB::table('intakecordinator')
->where('id', $id)
->update(['password' => $input['password']]);
return response()->json(['success'=>'Password Updated'], $this-> successStatus);

}
else
{
return response()->json(['error'=>"No such User exist"], 401);
}


}

public function updateschedule(Request $request,$id){

$schedule = DB::table('schedule')
->select('*')
->where('id', $id)
->first();


if($schedule)
{


$data = array('client_id' => $request->client_id,
'caregiver_id' => $request->caregiver_id,
'intakeco_id' => $request->intakeco_id,
'timeStart' => $request->timeStart,
'timeEnd' => $request->timeEnd,

'date' => $request->date
);


if($data)
{
$id = $schedule->id;
$update = DB::table('schedule')
->where('id', $id)
->update(['client_id' => $request->client_id,
'caregiver_id' => $request->caregiver_id,
'intakeco_id' => $request->intakeco_id,
'timeStart' => $request->timeStart,
'timeEnd' => $request->timeEnd,
'date' => $request->date,
]);
return response()->json(['success' => 'Schedule Updated Succesfully'], $this-> successStatus);
}
else
{
return response()->json(['error'=>'Fill all the fields'], 401);
}
}
else
{
return response()->json(['error'=>'No Such Schedule Exist'], 401);
}

}


public function addrecurringschedule(Request $request,$id){

$caregiver = DB::table('recurringschedule')
->select('*')
->where('caregiver_id',$id)
->first();
//if record exist, update the record
if($caregiver)
{
$caregiver_id = $caregiver->caregiver_id;
$update = DB::table('recurringschedule')
->where('caregiver_id', $caregiver_id)
->update(['caregiver_id' => $request->caregiver_id,
'dateStart' => $request->dateStart,
'dateEnd' => $request->dateEnd,
'timeStart' => $request->timeStart,
'timeEnd' => $request->timeEnd,

'daily' => $request->daily,
'weekly' => $request->weekly,
'monthly' => $request->monthly,
'custom' => $request->custom,
]);
return response()->json(['success' => 'Recurring Schedule Updated Succesfully'], $this-> successStatus);
}
//if record does not exist, create new record
else
{
$data = array(
'caregiver_id' => $request->caregiver_id,
'dateStart' => $request->dateStart,
'dateEnd' => $request->dateEnd,
'timeStart' => $request->timeStart,
'timeEnd' => $request->timeEnd,

'daily' => $request->daily,
'weekly' => $request->weekly,
'monthly' => $request->monthly,
'custom' => $request->custom,
);


if($data)
{
DB::table('recurringschedule')->insert($data);

$caregivers = DB::table('caregivers')
					->select('*')
					->where('id', $request->caregiver_id)
					->first();
					$name = $caregivers->name;

			$data = array('title' => 'Recurring Schedule Added',
						'description' => ' IntakeCordinator Added a recurring schedule for caregiver '.$name,
						'type' =>'recurringscheduleadded',
						'from' => 'intakecordinator',
						'to' => 'admin',
						'admin' =>3,
						'intakeco_id' =>$caregivers->id,
						'date' =>date('Y-m-d '),
						'time' => date('H:i:s')
						);

			DB::table('notifications')->insert($data);

return response()->json(['success' => 'Recurring Schedule Added Succesfully'], $this-> successStatus);
}
else
{
return response()->json(['error'=>'Fill all the fields'], 401);
}

}

}


public function getschedules($id)
{
$schedules = DB::table('schedule')
->select('*')
->where('intakeco_id', $id)
->first();


if($schedules)
{
    $schedules = DB::table('schedule')
->join('intakecordinator','intakecordinator.id','=','schedule.intakeco_id')
->join('clients','clients.id','=','schedule.client_id')
->select('intakecordinator.*','clients.*','schedule.*')
->where('schedule.intakeco_id', $id)
->get();
return response()->json(['success' => $schedules], $this-> successStatus);
}

else
{
return response()->json(['error'=>'No Data Found Exist'], 401);
}
}


public function getOtp(Request $request)
{
$otp = $request->otp;

$data = DB::table('intakecordinator')
->select('id')
->where('otp',$otp)
->get();

if($otp)
{
return response()->json(['success' => $data], $this-> successStatus);
}
else
{
return response()->json(['error'=>'No Such User Exist'], 401);
}

}

public function getrefNotification($id){

$data = DB::table('notifications')
->select('*')
->where('intakeco_id',$id)
->first();

$status=$data->status;

if($status=1){
return response()->json(['success' => 'Admin Approve Your Client Profile'], $this-> successStatus);
}
else{
return response()->json(['error'=>'Admin didnot Approve Your Client Profile'], 401);

}
}
public function updateintakeprofile(Request $request, $id)
{
 
if ($request->hasFile('image')) 
{
$extension=$request->image->extension();
$filename=time()."_.".$extension;
$request->image->move(public_path('/clients'),$filename);
$update = DB::table('intakecordinator')
->where('id', $id)
->update([
'intake_name' => $request->intake_name,
'password' => $request->password,
'phone' => $request->phone,
'image' => $filename

]);
return response()->json(['success' => 'Profile Updated Succesfully'], $this-> successStatus);

} else{
 $update = DB::table('intakecordinator')
->where('id', $id)
->update([
'intake_name' => $request->intake_name,
'password' => $request->password,
'phone' => $request->phone,

]);
return response()->json(['success' => 'Profile Updated Succesfully'], $this-> successStatus);
 
 
} 




}

public function getnotification($id)
{

$intakeco_id = DB::table('notifications')
->select('intakeco_id')
->where('intakeco_id',$id)
->first();


if($intakeco_id)
{
$notification = DB::table('notifications')
->select('description')
->where('intakeco_id',$id)
->where('from','=','admin')
->orderByDesc('id')
->get();
return response()->json(['success' => $notification], $this-> successStatus);
}

else
{
return response()->json(['error'=>'No Notifications Found'], 401);
}
}

public function getmessage($id){

$intakeco_id = DB::table('messages')
->select('intakeco_id')
->where('intakeco_id',$id)
->where('type','send')
->first();


if($intakeco_id)
{
$message = DB::table('messages')
->select('message','date','time')
->where('intakeco_id',$id)
->get();
return response()->json(['success' => $message], $this-> successStatus);
}

else
{
return response()->json(['error'=>"No Message Found"], 401);
}


}

public function sendmessage(Request $request){

$data = array('message' => $request->message,
'from' => 'intakeCordinator',
'to' => 'admin',
'type' => 'receive',
'admin' =>'3',
'intakeco_id' =>$request->intakeco_id,
'date' =>date('Y-m-d '),
'time' => date('H:i:s')

);
DB::table('messages')->insert($data);

$notification = array('title' => 'New Message',
'description' => 'New Message From '.$request->intakeco_id.' ',
'type' =>'message',
'from' => 'intakeCordinator',
'to' => 'admin',
'intakeco_id' =>$request->intakeco_id,
'status' =>1,
'date' =>date('Y-m-d '),
'time' => date('H:i:s')
);
 DB::table('notifications')->insert($notification); 

return response()->json(['success'=>'Message sent to intake cordinator.'], $this-> successStatus);

}
public function gethomeassessment($id)
{

$data = DB::table('home_assessment')
->select('*')
->where('client_id',$id)
->first();
if($data)
{
$homeassessment = DB::table('home_assessment')
->select('*')
->where('client_id',$data->id)
->get();
return response()->json(['success' => $homeassessment], $this-> successStatus);
}
else
{
return response()->json(['error'=>'No Data Found'], 401);
}
}

public function getmco($id)
{

$data = DB::table('mco')
->select('*')
->where('client_id',$id)
->first();
if($data)
{
$mco = DB::table('mco')
->select('*')
->where('client_id',$data->id)
->get();
return response()->json(['success' => $mco], $this-> successStatus);
}
else
{
return response()->json(['error'=>'No Data Found'], 401);
}


}

public function getmeetings($id)
{
$intakeco_id = DB::table('meetings')
->select('*')
->where('intakeco_id',$id)
->first();

if($intakeco_id)
{
$meetings = DB::table('meetings')
->join('clients','clients.id','=','meetings.client_id')
->select('clients.*','meetings.*')
->where('meetings.intakeco_id', $id)
->get();

return response()->json(['meetings' => $meetings], $this-> successStatus);
}

else
{
return response()->json(['error'=>'No Such Meeting Exist'], 401);
}
}

public function getintakeprofile(Request $request,$id)
{

$user = DB::table('intakecordinator')
->select('*')
->where('id',$id)
->first();

if($user)
{
return response()->json(['success' => $user], $this-> successStatus);
}

else
{
return response()->json(['error'=>'No User Found'], 401);
}
}

public function homescreen($id)
{
	$date = \Carbon\Carbon::today()->subDays(7);

$clients = DB::table('clients')
->select(DB::raw('id'))
->whereRaw('Date(created_at) = CURDATE()')
->count();


$referrals = DB::table('clients')
->select('*')
->where('intake_Co',$id)
->where('created_at','>=',$date)
->count();

$clientsdata = DB::table('clients')
->select(DB::raw('*'))
->whereRaw('Date(created_at) = CURDATE()')
->get();


$referralsdata = DB::table('clients')
->select('*')
->where('intake_Co',$id)
->where('created_at','>=',$date)
->get();

return response()->json(['clients' => $clients,'referrals' => $referrals,
'clientsData' => $clientsdata,'referralsData' => $referralsdata], $this-> successStatus);
}



public function getschedule(Request $request)
{

$intakeco_id = $request->intakeco_id;
$caregiver_id = $request->caregiver_id;


$schedules = DB::table('schedule')
->select('*')
->where('intakeco_id',$intakeco_id)
->where('caregiver_id',$caregiver_id)
->first();


if($schedules)
{
// 	$client = DB::table('schedule')
// ->join('clients','clients.id','=','schedule.client_id')
// ->select('clients.*')
// ->where('schedule.intakeco_id',$intakeco_id)
// ->where('schedule.caregiver_id',$caregiver_id)
// ->get();

$schedule = DB::table('schedule')
->select('*')
->where('intakeco_id',$intakeco_id)
->where('caregiver_id',$caregiver_id)
->get();

return response()->json(['schedule' => $schedule], $this-> successStatus);
}

else
{
return response()->json(['error'=>'No Such Schedule Exist'], 401);
}
}


public function getclientintakeschedule(Request $request)
{

$intakeco_id = $request->intakeco_id;
$client_id = $request->client_id;


$schedules = DB::table('schedule')
->select('*')
->where('intakeco_id',$intakeco_id)
->where('client_id',$client_id)
->first();


if($schedules)
{

$schedule = DB::table('schedule')
->select('*')
->where('intakeco_id',$intakeco_id)
->where('client_id',$client_id)
->get();

return response()->json(['schedule' => $schedule], $this-> successStatus);
}

else
{
return response()->json(['error'=>'No Such Schedule Exist'], 401);
}
}


public function feedback(Request $request,$id)
{

	$schedule = DB::table('schedule')
				->select('*')
				->where('id',$id)
				->first();

$data = array(
'client_id' => $schedule->client_id,
'caregiver_id' => $schedule->caregiver_id,
'intakeco_id' => $schedule->intakeco_id,
'schedule_id' => $schedule->id,
'client_feedback_desc' => $request->client_feedback_desc,
'status' => $request->status,
'very_satisfied' => $request->very_satisfied,
'neither_satisifed_orDissatisfied' => $request->neither_satisifed_orDissatisfied,
'dissatisfied' => $request->dissatisfied,
'very_dissatisfied' => $request->very_dissatisfied,
'date_of_feedback' =>date('Y-m-d '),
'created_at' =>date('Y-m-d '),
);


if($data)
{
	DB::table('feedback')->insert($data);
return response()->json(['success' => 'Thanks for your Feedback'], $this-> successStatus);
}

}


public function getintakecoDetails($id){

$data = DB::table('intakecordinator')
->select('*')
->where('id',$id)
->first();	

if($data)
{
return response()->json(['intakecorrdinator' => $data], $this-> successStatus);

}
else
{
return response()->json(['error'=>'No Such IntakeCoordinator Exist'], 401);
}

}

public function intakecodevicetoken(Request $request,$id)
{

$data = DB::table('intakecordinator')
->select('*')
->where('id',$id)
->first();
if($data)
{
$update = DB::table('intakecordinator')
->where('id', $id)
->update(['devicetoken' => $request->devicetoken]);

 
return response()->json(['success'=>'Device Token Updated'], $this-> successStatus);

}
else
{
return response()->json(['error'=>"No such User exist"], 401);
}


}




//end_line
}