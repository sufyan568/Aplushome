@extends('layouts.admin_header')
@section('content')
        <div class="page-wrapper">
           
               <div class="container-fluid">
               
                <div class="row">
                     <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                               <h3>Refered by</h3>

                                <center class="m-t-30"> <img src="{{url('public/clients/'.$details->image)}}" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10">{{$details->name}}</h4>
                                 </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
                                 <small class="text-muted p-t-30 db">Phone</small>
                                <h6>{{$details->phone}}</h6>

                                <small class="text-muted">Email address </small>
                                <h6>{{$details->email}}</h6>

                              </div>
                        </div>
                    </div>
                        
                    
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div  id="settings" >
                                    <div class="card-body">
                                        <form action="{{url('caregiverprofileremove')}}" method="Post" class="form-horizontal form-material"  enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                           <input type="hidden" name="id"  value="{{$details->id}}">
                                            <input type="hidden" name="name"  value="{{$details->name}}">

                       <!--  -->
                                            <div class="form-group" style="display: none;">
                                                <label class="col-md-12 lbl2">Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="client_name"  value="{{$details->name}}" placeholder="Enter Name" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12 lbl2">Reason</label>
                                                <div class="col-md-12">
                                                    <textarea type="text" placeholder="Enter Message to Caregiver" name="message" class="form-control form-control-line" rows="5"></textarea>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group ">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn regbtn2">Reject Profile</button>
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