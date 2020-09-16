<?php

namespace App\Http\Controllers;

 use App\Mail\ForgetpwdEmail;
 use App\Mail\intakeCoSendPassword;
 use App\Mail\appresetpassword;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
   


    public static function sendforgetpwdEmail($id, $email){
        $data = [
            'id' => $email,
            'email' => $id
        ];
      
        Mail::to($id)->send(new ForgetpwdEmail($data));
        
    }

public static function intakecoSendPassword ($email, $password){
      

        $data = [
            'email' => $email,
            'password' => $password
        ];
      
        Mail::to($email)->send(new intakeCoSendPassword($data));
        
    }


    public static function resetPasswordApp ($email, $id){
        

        $number = rand(1000 , 9999);
        $result= DB::table('intakecordinator')
        ->where('id',$id)
         ->update(['otp' => $number]);

        $data = [
        'id' => $id,
        'number' => $number
        ];


      
        Mail::to($email)->send(new appresetpassword($data));
        
    }
    public static function caregiverresetPasswordApp ($email, $id){
        

        $number = rand(1000 , 9999);
        $result= DB::table('caregivers')
        ->where('id',$id)
         ->update(['otp' => $number]);

        $data = [
        'id' => $id,
        'number' => $number
        ];


      
        Mail::to($email)->send(new appresetpassword($data));
        
    }




    
}
