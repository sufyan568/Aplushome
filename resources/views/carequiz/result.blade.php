@extends('layouts.admin_header')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<div class="page-wrapper">
  <div class="container-fluid">

    <section id="tabs">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 col-sm-6">
            <span class="h2 fontfamily pt-5">Care Quiz Result</span>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
 
          </div>
        </div>
        <div class="row mt-3 center1">
          <div class="col-lg-12">
            <div class="table-responsive card">
              <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-light card-header" style="background-color: #ECECEC;">
                  <tr class="tblhd1">
                    <th>Quiz Name</th>
                     <th>Total Question</th>

                     <th>Correct Answer</th>
                    <th>Caregiver</th>
                    <th>Score</th>
                    </tr>
                </thead>
                <tbody class="card-body">
                 @foreach($view as $row)
                 <tr class="">
                  <td>{{$row->quizname}}</td>
                   <td>{{$totalquestion}}</td>

                   <td>{{$correctanswer}}</td>
                  <td>{{$row->name}}</td>

                  <td><?php $answer= $row->answer;
                    $canswer= $row->correct_answer;
                    echo $correctanswer .'/'. $totalquestion;

                  ?></td>
                  

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