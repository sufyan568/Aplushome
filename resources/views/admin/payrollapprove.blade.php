@extends('layouts.admin_header')
@section('content')
        <div class="page-wrapper">
           
               <div class="container-fluid">
               
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="{{url('public/clients/'.$notifications->image)}}" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10">{{$notifications->intake_name}}</h4>
                                    <h6 class="card-subtitle">Profile Details</h6>
                                 </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
                                 
                                <small class="text-muted">Email address </small>
                                <h6>{{$notifications->email}}</h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6>{{$notifications->phone}}</h6> 
                                <small class="text-muted p-t-30 db">Address</small>
                                <h6>{{$notifications->address}}</h6>
                                                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div  id="settings" >
                                    <div class="card-body">
                                        <form action="{{route('increasepayroll')}}" method="Post" class="form-horizontal form-material"  enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="payrollid" value="{{$notifications->id}}">
                                             <input type="hidden" name="notificationid" value="{{$id}}">

                                            <div class="form-group mt-5">

                                                <label class="col-md-12 lbl2">PayRoll</label>
                                                <div class="col-md-12"><div class="col-md-12">
                                                    <input type="text" name="intakeco_payroll"  value="{{$notifications->intakeco_payroll}}" placeholder="Enter Name" class="form-control form-control-line">
                                                
                                                </div>
                                            </div>
                                           
                                            <div class="form-group ">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Increase Payroll</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                           
                        </div>
                    </div>
                    <!-- Column -->
                </div>
@endsection