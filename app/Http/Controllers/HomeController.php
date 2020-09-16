<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 public function index()
   {
   $newreff = DB::table('clients')->select('*')->whereDate('created_at', Carbon::now()->subDays(7))
   ->where('approved',0)->count(); 
   $notification = DB::table('clients')->join('intakecordinator','intakecordinator.id','=','clients.intake_Co')->select('intakecordinator.*', 'clients.*')->where('clients.approved', 0)->orderBy('clients.id', 'DESC')->take(1)->get(); 
    
   //notification popup
    $modalnotification = DB::table('notifications') ->select('*')->where('status',1)->where('type','!=','message')->where('from','!=','admin')->take(3)->orderBy('id', 'DESC')->get();



     
    $count = DB::table('notifications') ->select('*')->where('type','!=','message')->where('deactivate','!=',1)->where('from','!=','admin')->count();
    Session::put('notification',$modalnotification);
    Session::put('count',$count);
   //dailycarelogs 
   $dailycarelogs = DB::table('notifications')->join('intakecordinator','intakecordinator.id','=','notifications.intakeco_id')->where('notifications.from','!=','admin')->select('intakecordinator.*','notifications.*')->get();
   //chat poup
    $intakeco = DB::table('messages')->distinct()->get(['intakeco_id']);  
    foreach ($intakeco as $row ) {
    $id= $row->intakeco_id;       
    $allmessages[] = DB::table('messages')->join('intakecordinator','intakecordinator.id','=','messages.intakeco_id')->select('intakecordinator.*', 'messages.*')->where('messages.intakeco_id', $id)->latest('messages.date', 'DESC')->take(3)->first() ;
    } 
   Session::put('chatpopup',$allmessages);
  
      $notes = DB::table('caregiver_notes')->select('*')->orderBy('id', 'DESC')->take(3)->get();
      
  $schedule= DB::table('schedule')->join('clients','clients.id','=','schedule.client_id')
  ->join('caregivers','caregivers.id','=','schedule.caregiver_id')->select('caregivers.*', 'schedule.*')->where('schedule.client_id',$id)->get();
  
  $missedcheckin = DB::table('schedule')->join('caregivers','caregivers.id','=','schedule.caregiver_id')
  ->select('caregivers.*', 'schedule.*')->where('schedule.lastcheckin','=',null)->get();
  
  $newreferral   = DB::table('clients') ->select('*')->where('approved',0)->count();
  
  $newcaregiver   = DB::table('caregivers') ->select('*')->where('approved',0)->count();
 
    Session::put('referrals',$newreferral);
        Session::put('newcaregivers',$newcaregiver);


/* print_r($newreferral);
 exit();*/
        
   return view('home',compact('newreff','notification','dailycarelogs','notes','schedule','missedcheckin'));
   }

  public function newrefferals(){
 
      $newreff = DB::table('clients')->select('*')->whereDate('created_at', Carbon::now()->subDays(7))->where('approved',0)->get(); 

   return view('admin.newrefferals',compact('newreff'));

  } 

  

}
