@extends('layouts.admin_header')
@section('content')
        <div class="page-wrapper">
           
               <div class="container-fluid">
               
                <div class="row">
                     <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
 
                                <center class="m-t-30">
                                       @if($details->image)
                                               <img src="{{url('public/clients/'.$details->image)}}" class="img-circle" width="150"; height="150"; />
                                                @else
                                                <img src="{{url('public/images/person.png')}}"" alt="view" class="img-circle" style="height: 50px">
                                                @endif
                                    
                                    
                                    
                                     
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
                                
                                
                                <small class="text-muted">Skills </small>
                                <h6>{{$details->skills}}</h6>
                                
                                 <small class="text-muted">File</small>
                            <h6><a href="{{url('/caregiverfiledownload/'.$details->id)}}">
                            <img src="{{url('public/images/doc.png')}}" alt="view" class="img-circle" style="height: 50px">
                            </a></h6>
                                
                                <small class="text-muted">Document</small>
                                <h6><a href="{{url('/caregiverdoc/'.$details->id)}}">
                            <img src="{{url('public/images/doc.png')}}" alt="view" class="img-circle" style="height: 50px">
                            </a></h6>
                                
                                

                              </div>
                        </div>
                    </div>
                        
                    
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div  id="settings" >
                                    <div class="card-body">
                                        <form action="{{url('profileapprovestatus')}}" method="Post" class="form-horizontal form-material"  enctype="multipart/form-data">
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
                                                <label class="col-md-12 lbl2">Message</label>
                                                <div class="col-md-12">
                                                    <textarea type="text" placeholder="Enter Message to Caregiver" name="address" class="form-control form-control-line" rows="5"></textarea>
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