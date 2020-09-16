<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AccountingController extends Controller
{
   
    public function index()

    {
          
        $approveclients= DB::table('work_history')
        ->join('clients','clients.id','=','work_history.client_id')
        ->join('caregivers','caregivers.id','=','work_history.caregiver_id')
        ->select('clients.*', 'caregivers.*','work_history.*')
         ->get();

 
    	return view('accounting.accounting',compact('approveclients'));
    }




   }
