@extends('layouts.admin_header')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<div class="page-wrapper">
  <div class="container-fluid">

    <section id="tabs">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 col-sm-6">
            <span class="h2 fontfamily pt-5">Care Quiz</span>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <a href="{{url('addnewcarequiz')}}" title="">
            <button type="button"  class="btn addnewbtn float-right">Add New</button>
            </a>
          </div>
        </div>
        <div class="row mt-3 center1">
          <div class="col-lg-12">
            <div class="table-responsive card">
              <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-light card-header" style="background-color: #ECECEC;">
                  <tr class="tblhd1">
                    <th>Date Created</th>
                    <th>Quiz Name</th>
                    <th>Tests given</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="card-body">
                 @foreach($view as $row)
                 <tr class="">
                  <td>{{$row->date}}</td>
                  <td>{{$row->quizname}}</td>
                <td><?php 
                $id=$row->quiz_id;
                $testgiven = DB::table('quiz')
                ->select('*')
                ->where('quiz_id',$id)
                ->count(); 

                 echo $testgiven


                  ?></td>
                  
                  <td>
                    <a href="{{url('carequizshow/'.$row->quiz_id)}}" title=""><img src="{{ asset('public/icons/image/view.png')}}" alt="" class="sideicon"></a>
                    <!-- <a href="{{url('quizview/'.$row->quiz_id)}}" title=""><img src="{{ asset('public/icons/image/update.png')}}" alt="" class="sideicon"></a> -->

                    <a href="{{url('/carequiz/'.$row->id.'/delete/')}}" onclick="return confirm('Are you sure you want to delete this quiz?')"  title=""><img src="{{ asset('public/icons/image/delete.png')}}" alt="" class="sideicon"></a>  
            
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