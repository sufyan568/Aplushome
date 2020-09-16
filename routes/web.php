<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/recentactivity', 'HomeController@newrefferals');



//Clients
Route::get('/client', 'ClientController@index')->name('client');
Route::post('/addclient', 'ClientController@addclient')->name('addclient');
Route::get('/profiledetails/{id}/', 'ClientController@clientdetail');
Route::post('/deactivate', 'ClientController@deactivate')->name('deactivate');
Route::get('/clientprofiledetails/{id}/', 'ClientController@clientdetailfull');
Route::post('/updateclientprofile', 'ClientController@updateclientprofile')->name('updateclientprofile');
Route::get('/clientprofileapprove/{id}/', 'ClientController@clientprofileapprove');
Route::post('/approveclient', 'ClientController@approveclient')->name('approveclient');
Route::get('/removeprofile/{id}/', 'ClientController@removeprofile');
Route::post('/homeassesment', 'ClientController@homeassesment')->name('homeassesment');
Route::post('/mco', 'ClientController@mco')->name('mco');
Route::get('/client/{id}/delete', 'ClientController@deleteclient');



//Caregiver
Route::get('/caregiver', 'CaregiverController@index')->name('caregiver');
Route::get('/caregiverapprovepayroll/{id}', 'CaregiverController@approvepayroll')->name('caregiverapprovepayroll');
Route::post('/addcaregiver', 'CaregiverController@addcaregiver')->name('addcaregiver');
Route::get('/caregiverprofiledetails/{id}/', 'CaregiverController@caregiverprofiledetails');
Route::post('/updatecaregiverprofile', 'CaregiverController@updatecaregiverprofile')->name('updatecaregiverprofile');
Route::get('/caregiverprofileapprove/{id}', 'CaregiverController@caregiverprofileapprove')->name('caregiverprofileapprove');
Route::get('/unapproved/{id}', 'CaregiverController@unapproved')->name('unapproved');
Route::post('/profileapprovestatus', 'CaregiverController@profileapprovestatus')->name('profileapprovestatus');
Route::post('/caregiverprofileremove', 'CaregiverController@caregiverprofileremove')->name('caregiverprofileremove');
Route::post('/caregiverincreasepayroll', 'CaregiverController@caregiverincreasepayroll')->name('caregiverincreasepayroll');
Route::get('/caregiver/{id}/delete', 'CaregiverController@deletecaregiver');


//IntakeCordinator
Route::get('/intakeCordinator', 'IntakeCordinatorController@index')->name('intakeCordinator');
Route::post('/addintakeCordinator', 'IntakeCordinatorController@addintakeCordinator')->name('addintakeCordinator');
Route::get('/intakecoprofiledetails/{id}/', 'IntakeCordinatorController@intakecoprofiledetails');
Route::post('/updateintakecoprofile', 'IntakeCordinatorController@updateintakecoprofile')->name('updateintakecoprofile');
Route::get('/intakeCordinator/{id}/delete', 'IntakeCordinatorController@deleteintakeCordinator');



/*Reset password*/

Route::get('/resetpassword', 'Auth\ResetPasswordController@resetpassword')->name('resetpassword');
Route::post('/sendemail', 'Auth\ResetPasswordController@sendemail')->name('sendemail');
Route::get('/sucessfullyupdated', 'Auth\ResetPasswordController@sucessfullyupdated')->name('sucessfullyupdated');
Route::post('/updatepassword', 'Auth\ResetPasswordController@updatepassword')->name('updatepassword');
Route::get('/newpassword', 'Auth\ResetPasswordController@newpassword')->name('newpassword');



//Admin
Route::get('/changepassword', 'AdminController@changepassword')->name('changepassword');
Route::post('/newpassword', 'AdminController@newpassword')->name('newpassword');
Route::get('/addtask', 'AdminController@addtask')->name('addtask');
Route::post('/addmeeting', 'AdminController@addmeeting')->name('addmeeting');
Route::post('/addschedule', 'AdminController@addschedule')->name('addschedule');
Route::post('/addscheduleintakeco', 'AdminController@addscheduleintakeco')->name('addscheduleintakeco');

Route::get('/myprofile', 'AdminController@myprofile')->name('myprofile');
Route::get('/addstaff', 'AdminController@addstaff')->name('addstaff');
Route::post('/createstaff', 'AdminController@create')->name('createstaff');
Route::get('/referrals', 'AdminController@referrals')->name('referrals');


/*Faq*/
Route::get('/faq', 'AdminController@faq')->name('faq');
Route::post('/faqquestion', 'AdminController@addtaskquestions')->name('faqquestion');
Route::post('/faqvideo', 'AdminController@addtaskVideo')->name('faqvideo');
Route::get('/faqdelete/{id}/delete', 'AdminController@faqdelete');
Route::get('/faqupdate/{id}', 'AdminController@faqupdate');
Route::post('/updatefaqquestion', 'AdminController@updatefaqquestion');
Route::post('/updatefaqvideo', 'AdminController@updatefaqvideo');


Route::get('/viewprofile', 'AdminController@viewprofile')->name('viewprofile');
Route::post('/updateprofile', 'AdminController@updateprofile')->name('updateprofile');
Route::get('/inbox', 'AdminController@inbox')->name('inbox');
Route::post('/sendmessage', 'AdminController@sendmessage')->name('sendmessage');
Route::post('/caregiversms', 'AdminController@caregiversms')->name('caregiversms');
Route::post('/intakecosms', 'AdminController@intakecosms')->name('intakecosms');

Route::get('/conversation/{id}/', 'AdminController@conversation');
Route::get('/caregiver_conversation/{id}/', 'AdminController@caregiver_conversation');
Route::post('/conversation_caregiversms', 'AdminController@conversation_caregiversms')->name('conversation_caregiversms');
Route::get('/fetch_caregiver_message/', 'AdminController@fetch_caregiver_message');
Route::post('/caregiver_sendmessage', 'AdminController@caregiver_sendmessage')->name('caregiver_sendmessage');

Route::get('/fetchmessage/', 'AdminController@fetchmessage');

Route::get('/notifications', 'AdminController@notifications')->name('notifications');
Route::get('/single_notification/{id}', 'AdminController@single_notification')->name('single_notification');



Route::get('/approvepayroll/{id}/', 'AdminController@approvepayroll');
Route::get('/rejectpayrollreq/{id}/', 'AdminController@rejectpayrollreq');


Route::post('/conversationMessage', 'AdminController@conversationMessage')->name('conversationMessage');
Route::post('/increasepayroll', 'AdminController@increasepayroll')->name('increasepayroll');
Route::get('/markallunread', 'AdminController@markallunread')->name('markallunread');
Route::get('/getnotificationcount', 'AdminController@getnotificationcount')->name('getnotificationcount');


/*AccountingController*/

Route::get('/accounting', 'AccountingController@index')->name('accounting');



/*carequiz*/
Route::get('/seeresult/{id}/', 'CarequizController@seeresult');

Route::get('/carequiz', 'CarequizController@index')->name('carequiz');
Route::get('/carequizshow/{id}', 'CarequizController@show')->name('carequizshow');
Route::get('/addnewcarequiz', 'CarequizController@addnew')->name('addnewcarequiz');
Route::get('/quizview/{id}', 'CarequizController@quizview')->name('quizview.{id}');
Route::post('/createcarequiz', 'CarequizController@createcarequiz')->name('createcarequiz');
Route::post('/carequizupdate', 'CarequizController@update')->name('carequizupdate');
Route::get('/carequiz/{id}/delete', 'CarequizController@delete');
/*Weekly Survey*/

Route::get('/weeklysurvey', 'SurveyController@index')->name('weeklysurvey');
Route::get('/surveyshow/{id}', 'SurveyController@show')->name('surveyshow');

Route::get('/addnewsurvey', 'SurveyController@addnewsurvey')->name('addnewsurvey');
Route::get('/surveyview/{id}', 'SurveyController@surveyview')->name('surveyview');

Route::get('/seesurveyresult/{id}/', 'SurveyController@seeresult');

Route::post('/createsurvey', 'SurveyController@create')->name('createsurvey');
Route::post('/surveyupdate', 'SurveyController@update')->name('surveyupdate');

Route::get('/weeklysurvey/{id}/delete', 'SurveyController@delete');

/*FeedBack*/

Route::get('/feedback', 'FeedbackController@index')->name('feedback');

/*Reports*/

Route::get('/report', 'ReportController@index')->name('report');
Route::get('/filedownload/{id}', 'ReportController@filedownload')->name('filedownload');
Route::get('/notesdownload/{id}', 'ReportController@notesdownload')->name('notesdownload');
Route::get('/certificatedownload/{id}', 'ReportController@certificatedownload')->name('certificatedownload');

Route::get('/caregiverfiledownload/{id}', 'ReportController@caregiverfiledownload')->name('caregiverfiledownload');
Route::get('/caregiverdoc/{id}', 'ReportController@caregiverdoc')->name('caregiverdoc');


Route::post('/anotherquestions', 'CarequizController@createanothercarequiz')->name('createanothercarequiz');

