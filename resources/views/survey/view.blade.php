@extends('layouts.admin_header')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<div class="page-wrapper">
  <div class="container-fluid">

    <section id="tabs">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 col-sm-6">
            <span class="h2 fontfamily pt-5">Weekly Survey</span>
          </div>
           <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="{{url('/seesurveyresult/'.$id)}}"><button type="button" class="btn regbtn2">See Result</button></a>

          
        </div>
        </div>
        <div class="row mt-3 center1">
          <div class="col-lg-12">
            <div class="table-responsive card">
              <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-light card-header" style="background-color: #ECECEC;">
                  <tr class="tblhd1">
                    <th>Survey Name</th>
                    <th>Question Name</th>
                    <th>Correct Answer</th>
                    <th>Action</th>
 
                    </tr>
                </thead>
                <tbody class="card-body">
                 @foreach($view as $row)
                 <tr class="">
                  <td>{{$row->survey_name}}</td>
                  <td>{{$row->survey_question}}</td>
                  <td>{{$row->correct_option}}</td>
                    
                  <td>
                    
                    <a href="{{url('surveyview/'.$row->id)}}" title=""><img src="{{ asset('public/icons/image/update.png')}}" alt="" class="sideicon"></a>
                    <a href="{{url('/weeklysurvey/'.$row->id.'/delete/')}}" onclick="return confirm('Are you sure you want to delete this quiz?')"  title=""><img src="{{ asset('public/icons/image/delete.png')}}" alt="" class="sideicon"></a>
            
                  </td>

@endforeach
                </tr>   
               

                      </div>
                    </table>
                  </div>
                </div>
              </div>


            </div>
          </div>
          @endsection