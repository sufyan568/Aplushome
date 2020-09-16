@extends('layouts.admin_header')
@section('content')
        <div class="page-wrapper">
           
               <div class="container-fluid">
               
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="{{url('public/admin/'.Auth::user()->image)}}" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10">{{$viewprofile->name}}</h4>
                                    <h6 class="card-subtitle">Profile Details</h6>
                                 </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
                                 <small class="text-muted p-t-30 db">Admin Role</small>
                                <h6>{{$viewprofile->admin_role}}</h6>

                                <small class="text-muted">Email address </small>
                                <h6>{{$viewprofile->email}}</h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6>{{$viewprofile->phone}}</h6> 
                                <small class="text-muted p-t-30 db">Address</small>
                                <h6>{{$viewprofile->address}}</h6>
                                                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div  id="settings" >
                                    <div class="card-body">
                                        <form action="{{route('updateprofile')}}" method="Post" class="form-horizontal form-material"  enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="oldimage" value="{{$viewprofile->image}}">
                                            <div class="form-group">
                                                <label class="col-md-12 lbl2">Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="name"  value="{{$viewprofile->name}}" placeholder="Enter Name" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email lbl2" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" value="{{$viewprofile->email}}" placeholder="Enter Email " class="form-control form-control-line" name="email" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12 lbl2">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="number" value="{{$viewprofile->phone}}" placeholder="Enter Phone" name="phone" class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12 lbl2">Address</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Enter Address" name="address" value="{{$viewprofile->address}}" class="form-control form-control-line">
                                                </div>
                                            </div>

                                             <div class="form-group lbl2">
                                                <label class="col-md-12">Image</label>
                                                <div class="col-md-12">
                                                    <input type="file" name="image" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
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