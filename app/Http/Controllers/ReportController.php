<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use DB;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report=Report::all();
        return view('reports/reports',compact('report'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filedownload($id)
    {
    $entry = Report::where('id', '=', $id)->firstOrFail();
    $pathToFile="public/caregivernotes/".$entry->notes;
/*    print_r($pathToFile);
    exit();*/
    return response()->download($pathToFile);           
    }


 public function caregiverfiledownload($id)
    {
    $entry =DB::table('caregivers')
        ->select('*')
        ->where('id', $id)
        ->first();
    $pathToFile="public/caregiverdocuments/".$entry->file;
/*    print_r($pathToFile);
    exit();*/
    return response()->download($pathToFile);           
    }



 public function caregiverdoc($id)
    {
    $entry =DB::table('caregivers')
        ->select('*')
        ->where('id', $id)
        ->first();
    $pathToFile="public/caregiverdocuments/".$entry->file;
/*    print_r($pathToFile);
    exit();*/
    return response()->download($pathToFile);           
    }



     public function notesdownload($id)
    {
    $entry =DB::table('caregiver_notes')
        ->select('*')
        ->where('id', $id)
        ->first();
    $pathToFile="public/caregivernotes/".$entry->notes;
/*    print_r($pathToFile);
    exit();*/
    return response()->download($pathToFile);           
    }
    
      public function certificatedownload($id)
    {
    $entry =DB::table('certificates')
        ->select('*')
        ->where('caregiver_id', $id)
        ->first();
    $pathToFile="public/caregivercertificate/".$entry->certificate;
/*    print_r($pathToFile);
    exit();*/
    return response()->download($pathToFile);           
    }

public function download($fileId){  
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
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
