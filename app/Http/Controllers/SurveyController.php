<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;
use DB;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
    $view=Survey::distinct(['quizname'])->get();
      return view('survey/weeklysurvey',compact('view'));

    }

     public function addnewsurvey()
    {
          $random  =(rand(0,1000));
        return view('survey/addnewsurvey',compact('random'));

    }  


       public function surveyview($id)
    {
        $surveyview =Survey::where('id',$id) ->get();
        return view('survey/surveyview',compact('surveyview'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      
 /*     print_r($request->all());
      exit();*/
      $survey_id  = $request->survey_id;
      $onetime = $request->onetime;
      $weekly = $request->weekly;
      $monthly = $request->monhtly;
      $recurring = $request->recurring;
      $survey_name = $request->survey_name;
      $survey_question = $request->survey_question;
      $option_a = $request->option_a;
      $option_b = $request->option_b;
      $option_c = $request->option_c;
      $option_d = $request->option_d;
      $correct_option = $request->correct_option;

      for($count = 0; $count < count($survey_question); $count++)
      {
       $data = array(
      'survey_id' => $survey_id,
      'onetime' => $onetime,
      'weekly' => $weekly,
      'monthly' => $monthly,
      'recurring' => $recurring,
      'survey_name' => $survey_name,
      'survey_question' => $survey_question[$count],
      'option_a' => $option_a[$count],
      'option_b' => $option_b[$count],
      'option_c' => $option_c[$count],
      'option_d' => $option_d[$count],
      'correct_option' => $correct_option[$count],
      'date' =>date('Y-M-d'),
        ); 
      Survey::insert($data);
      }


       return redirect('weeklysurvey')->with('Message','Survey Added successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $view =Survey::where('survey_id',$id) ->get();
        return view('survey/view',compact('view','id'));
   
    }

   public  function seeresult($id){


        $view = DB::table('surveyresult')
         ->join('caregivers','caregivers.id','=','surveyresult.caregiver_id')
          ->join('survey','survey.survey_id','=','surveyresult.survey_id') 
        ->select('caregivers.*','surveyresult.*','survey.*')
        ->where('survey.survey_id', $id)
          ->get();

        $totalquestion = DB::table('surveyresult')
        ->select('*')
        ->where('survey_id', $id)
        ->count(); 

        $correctanswer=DB::table('survey')
           ->join('surveyresult','surveyresult.survey_id','=','survey.survey_id') 
        ->select('survey.*','surveyresult.*')
        ->where('survey.correct_option', 'surveyresult.answer')
         ->count();

        return view('survey/result',compact('view','totalquestion','correctanswer'));
   } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {

      $id=$request->id;
      

       $survey_question = $request->survey_question;
      $option_a = $request->option_a;
      $option_b = $request->option_b;
      $option_c = $request->option_c;
      $option_d = $request->option_d;
 

 $update = DB::table('survey')
      ->where('id', $id)
      ->update(['survey_question' => $request->survey_question,
                 'option_a' => $request->option_a,
                 'option_b' =>$request->option_b,
                 'option_c' => $request->option_c,
                 'option_d' => $request->option_d,
              
                 ]);

       return redirect('weeklysurvey')->with('Message','Quiz Added successfully');

    }
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */

       public function delete($id)
        {

        $survey=Survey::find($id);
        $deleted = $survey->delete();
        if ($deleted) 
        {
        return redirect('/weeklysurvey')->with ('message', 'survey successfully deleted!');
        }
        }  

}
