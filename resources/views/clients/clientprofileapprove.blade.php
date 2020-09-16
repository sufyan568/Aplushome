@extends('layouts.admin_header')
@section('content')
        <div class="page-wrapper">
           
               <div class="container-fluid">
               
                <div class="row">
                     <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                               <h3>Refered by</h3>

                                <center class="m-t-30"> <img src="{{url('public/clients/'.$referby->image)}}" class="img-circle" width="150"; height="150"  />
                                    <h4 class="card-title m-t-10">{{$referby->intake_name}}</h4>
                                 </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
                                 <small class="text-muted p-t-30 db">Phone</small>
                                <h6>{{$referby->phone}}</h6>

                                <small class="text-muted">Email address </small>
                                <h6>{{$referby->email}}</h6>

                              </div>
                        </div>
                    </div>
                        
                    
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div  id="settings" >
                                    <div class="card-body">
                                        <form action="{{route('approveclient')}}" method="Post" class="form-horizontal form-material"  enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                           <input type="hidden" name="id"  value="{{$details->id}}">
                                            <input type="hidden" name="intakeco_id"  value="{{$referby->id}}">

                                            <div class="form-group">
                                                <label class="col-md-12 lbl2">Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="client_name"  value="{{$details->client_name}}" placeholder="Enter Name" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email lbl2" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" value="{{$details->email}}" placeholder="Enter Email " class="form-control form-control-line" name="email" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12 lbl2">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="number" value="{{$details->phone}}" placeholder="Enter Phone" name="phone" class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12 lbl2">Address</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Enter Address" name="address" value="{{$details->address}}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-12 lbl2">Commission %</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Enter %age" name="commission" class="form-control form-control-line">
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-12 lbl2">Start Date</label>
                                                <div class="col-md-12">
                                                    <input type="date" placeholder="Enter Start Date" name="startdate" class="form-control form-control-line">
                                                </div>
                                            </div>

                                           <div class="form-group">
                                                <label class="col-md-12 lbl2">Hourly Rate</label>
                                                <div class="col-md-12">
                                             <input type="text" placeholder="Enter Rate per hour" name="payroll" class="form-control form-control-line">
                                             
                                              
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <div class="col-sm-12">
                                                    <button class="btn regbtn2">Approve Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                           
                        </div>
                    </div>
                    <!-- Column -->
           
</div>
</div>
                </div>

@endsection