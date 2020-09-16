<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\MailController;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public  function resetpassword(Request $request)
    {
    return view('auth.passwords.resetpassword');
    
    }

     public  function sucessfullyupdated(Request $request)
    {
    return view('auth.passwords.success');
    
    }

    public function newpassword(Request $request)
    {
        $email = \Illuminate\Support\Facades\Request::get('code'); 
        return view('auth.passwords.newpassword',compact('email'));
    }


    public  function sendemail(Request $request)
    {
        $email=$request->email;

        $result = DB::table('users')
        ->select('*')
        ->where('email', $email)
        ->first();
        if($result != null){
          $id =$result->id;   
         MailController::sendforgetpwdEmail($email,$id);
         return back()->with('message','Please Check your email');
        }
        else{
       return back()->with('message','Email error');
        }   

    }



    public function updatepassword(Request $request){
          
        $confirmpassword=$request->confirmpassword;
        $newpassword=$request->password;
        if($newpassword == $confirmpassword ){
            $id=$request->email;

        $password = DB::table('users')
        ->where('email', $id)
        ->update(['password' => bcrypt($newpassword)
                 ]);
         return redirect('/sucessfullyupdated');

        }
        else{
        return back()->with('message','Confirm Password not matched');;
        }
        

        }
}
