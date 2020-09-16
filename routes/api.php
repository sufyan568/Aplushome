<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
return $request->user();
});

//forchat
Route::get('/getintakecoordinator/{id}','Api@getintakecoDetails');

//Caregiver APIs
//Caregiver APIs

Route::post('/caregiverlocation','CaregiverApi@caregiverlocation');
Route::get('/getcaregiverlocation/{id}','CaregiverApi@getcaregiverlocation');

Route::post('/caregiverdevicetoken/{id}','CaregiverApi@caregiverdevicetoken');
Route::get('/getupcomingschedule/{id}','CaregiverApi@getupcomingschedule');

Route::post('caregiverlogin', 'CaregiverApi@caregiverlogin');
Route::post('/caregiverresetpassword','CaregiverApi@caregiverresetpassword');
Route::post('/caregiverupdatepassword/{id}','CaregiverApi@caregiverupdatepassword');
Route::post('/updatecaregiverprofile/{id}','CaregiverApi@updatecaregiverprofile');

Route::get('/getfaq','CaregiverApi@getfaq');
Route::get('/getallintakeco/{id}','CaregiverApi@getallintakeco');
Route::post('/addmedicalreport/{id}','CaregiverApi@addmedicalreport');
Route::get('/getmedicalreport/{id}','CaregiverApi@getmedicalreport');
Route::get('/getsurvey','CaregiverApi@getsurvey');
Route::post('/survey/{id}','CaregiverApi@survey');

Route::get('/getquizname/{id}','CaregiverApi@getquizname');
Route::get('/getquiz/{id}','CaregiverApi@getquiz');
Route::post('/quiz/{id}','CaregiverApi@quiz');

Route::get('/getcaregiverprofile/{id}','CaregiverApi@getcaregiverprofile');
Route::post('/getcaregiverOtp','CaregiverApi@getcaregiverOtp');

Route::post('/addreminder','CaregiverApi@addreminder');
Route::get('/getreminder/{id}','CaregiverApi@getreminder');

Route::post('/editreminder/{id}','CaregiverApi@editreminder');
Route::get('/deletereminder/{id}','CaregiverApi@deletereminder');

Route::post('/signup','CaregiverApi@signup');
Route::post('/caregiverpayrollrequest','CaregiverApi@caregiverpayrollrequest');


Route::get('/getcaregivernotification/{id}','CaregiverApi@getcaregivernotification');
 
Route::post('uploadincidentreports', 'CaregiverApi@uploadincidentreports');
Route::get('/getincidentreports/{id}','CaregiverApi@getincidentreports');

Route::post('/workhistory/{id}','CaregiverApi@workhistory');
Route::get('/getworkhistory/{id}','CaregiverApi@getworkhistory');
Route::get('/getclientworkhistory/{id}','CaregiverApi@getclientworkhistory');

Route::post('/certificate/{id}','CaregiverApi@certificate');
Route::get('/getcertificate/{id}','CaregiverApi@getcertificate');


Route::get('/getnotes/{id}','CaregiverApi@getnotes');
Route::post('uploadnotes/{id}', 'CaregiverApi@uploadnotes');


//otherdeveloper Api
Route::get('/getCaregiverSchedules/{id}','CaregiverApi@getCaregiverSchedules');

Route::get('/getschedulebyid/{id}','CaregiverApi@getschedulebyid');
Route::get('/getsingleschedule/{id}','CaregiverApi@getsingleschedule');


Route::get('/checkinuser/{id}','CaregiverApi@checkinuser');
Route::get('/checkoutuser/{id}','CaregiverApi@checkoutuser');



//intake APIs

Route::post('/intakecodevicetoken/{id}','Api@intakecodevicetoken');

Route::get('/getmco/{id}','Api@getmco');
Route::get('/gethomeassessment/{id}','Api@gethomeassessment');

Route::post('/feedback/{id}','Api@feedback');

Route::get('/homescreen/{id}','Api@homescreen');
Route::post('/getschedule','Api@getschedule');
Route::post('/getclientintakeschedule','Api@getclientintakeschedule');
Route::post('/editmeeting/{id}','Api@editmeeting');

Route::get('/getintakeprofile/{id}','Api@getintakeprofile');
Route::get('/getmeetings/{id}','Api@getmeetings');
Route::get('/getmessage/{id}','Api@getmessage');
Route::post('/sendmessage','Api@sendmessage');

Route::get('/getnotification/{id}','Api@getnotification');
Route::post('/updateintakeprofile/{id}','Api@updateintakeprofile');

Route::post('/addclient','Api@addclient');
Route::post('/addcaregiver','Api@addcaregiver');

Route::get('/getclients/{id}','Api@getclients');
Route::get('/getcaregivers/{id}','Api@getcaregivers');
Route::post('/addschedule','Api@addschedule');

Route::get('/clientdetail/{id}','Api@clientdetail');

Route::post('/resetpassword','Api@resetpassword'); 
Route::post('/intakeupdatepassword/{id}','Api@intakeupdatepassword');

Route::post('/updateschedule/{id}','Api@updateschedule');
// API Routes

Route::get('/getschedules/{id}','Api@getschedules');
Route::post('intakelogin', 'Api@intakelogin');
Route::post('/getOtp','Api@getOtp');
Route::post('/getrefNotification/{id}','Api@getrefNotification');


Route::post('/addrecurringschedule/{id}','Api@addrecurringschedule');

Route::post('/payrollrequest','Api@payrollrequest');

