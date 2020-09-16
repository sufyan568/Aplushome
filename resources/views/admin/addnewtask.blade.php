@extends('layouts.admin_header')

@section('content')
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <div class="container-fluid">

<section id="tabs">
<div class="container">
<h6 class="section-title h2 center1 fontfamily pt-5">Add New Task</h6>
<div class="card col-lg-10 center1">
<div class="row">
<div class="col-lg-12">
<nav>
<div class="card-header">
    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
    <a class="nav-item nav-link tab_css active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Add Meeting With CRM
    </a>

    <a class="nav-item nav-link tab_css" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Add Schedule With Caregiver</a>

    <a class="nav-item nav-link tab_css" id="nav-Coordinator-tab" data-toggle="tab" href="#nav-Coordinator" role="tab" aria-controls="nav-Coordinator" aria-selected="false">Add Schedule With Intake Coordinator</a>

</div>
</div>
</nav>
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">


<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="card-body">
            <form method="POST" action="{{ route('addmeeting') }}" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-body">
                    <div class="row ">
                        <div class="col-md-12 ">
                            <label class="control-label term1 col-md-12"> Select Time</label>
                            <div class="form-group row">
                        <div class="col-md-6 mt-3">
                                <div class="input-group">
                                <input type="date" class="form-control" name="date" placeholder="Select Date" >
                                </div>              
                      </div>
                                <div class="col-md-6 mt-3">
                                 <div class="input-group">
                                <input type="time" class="form-control" name="time" placeholder="Select Time" >
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
         
                <div class="row">
                    <div class="col-md-12">
                        <label class="control-label term1 col-md-12">Select Client </label>

                        <div class="form-group row">
                            <div class="col-md-12">
                                  <div class="input-group">
                                 <select class="form-control term1 custom-select" name="client_id">
                                                      
                                        @foreach($crmclients as $spc)
                                   
                                       <option value="{{$spc->id}}"><td>{{$spc->client_name}}</td></option>
                                         @endforeach
                              
                                </select> 
                                  <i class="mdi mdi-account-convert icon1"></i>
                                </div> 
                                 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="control-label term1 col-md-12">Select Intake Cordinator</label>

                        <div class="form-group row">
                            <div class="col-md-12">
                                 <div class="input-group">
                                 <select class="form-control term1 custom-select" name="intakeco_id">
                                    
                                    @foreach($intakecordinator as $spc)
                                   
                                       <option value="{{$spc->id}}"><td>{{$spc->intake_name}}</td></option>
                                         @endforeach
                                </select> 
                                  <i class="mdi mdi-account-convert icon1"></i>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="regbtn2 form-control">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
       </div>
   </form>
</div>
</div>

   <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          <div class="card-body">
            <form method="POST" action="{{ route('addschedule') }}" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-body">
                    <div class="row">
                    <div class="col-md-12">
                    <label class="control-label term1 col-md-12"> Select Date</label>
                    <div class="form-group row">
                    <div class="col-md-12">
                    <div class="input-group">
                    <input type="date" class="form-control" name="date" placeholder="Select date" >
                    </div> 
                    </div>

                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-md-12">
                    <label class="control-label term1 col-md-12"> Select Start Time</label>
                    <div class="form-group row">
                    <div class="col-md-12">
                    <div class="input-group">
                    <input type="time" class="form-control" name="timeStart" placeholder="Select time" required>
                    </div> 
                    </div>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                    <label class="control-label term1 col-md-12"> Select End Time</label>
                    <div class="form-group row">
                    <div class="col-md-12">
                    <div class="input-group">
                    <input type="time" class="form-control" name="timeEnd" placeholder="Select time" required>
                    </div> 
                    </div>
                    </div>
                    </div>
                    </div>



                    <div class="row">
                    <div class="col-md-12">
                    <label class="control-label term1 col-md-12">Select Client</label>

                    <div class="form-group row">
                    <div class="col-md-12">
                    <div class="input-group">
                    <select class="form-control custom-select" name="client_id">
                    @foreach($systemclients as $spc)

                    <option value="{{$spc->id}}"><td>{{$spc->client_name}}</td></option>
                    @endforeach
                    </select> 
                    <i class="mdi mdi-account-convert icon1"></i>
                    </div>    
                    </div>
                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-md-12">
                    <label class="control-label term1 col-md-12">Select Caregiver</label>

                    <div class="form-group row">
                    <div class="col-md-12">
                    <div class="input-group">
                    <select class="form-control custom-select" name="caregiver_id">
                    @foreach($activecaregivers as $spc)

                    <option value="{{$spc->id}}"><td>{{$spc->name}}</td></option>
                    @endforeach

                    </select> 
                    <i class="mdi mdi-account-convert icon1"></i>
                    </div>  
                    </div>
                    </div>
                    </div>
                    </div>
                <hr>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="regbtn2 form-control">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            </form>
    </div>   
            </div>
  <!-- Intake Coordinator -->
   <div class="tab-pane fade" id="nav-Coordinator" role="tabpanel" aria-labelledby="nav-Coordinator-tab">
          <div class="card-body">
            <form method="POST" action="{{ route('addmeeting') }}" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-body">
                    <div class="row">
                    <div class="col-md-12">
                    <label class="control-label term1 col-md-12"> Select Date</label>
                    <div class="form-group row">
                    <div class="col-md-12">
                    <div class="input-group">
                    <input type="date" class="form-control" name="date" placeholder="Select date" >
                    </div> 
                    </div>

                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-md-12">
                    <label class="control-label term1 col-md-12"> Select Start Time</label>
                    <div class="form-group row">
                    <div class="col-md-12">
                    <div class="input-group">
                    <input type="time" class="form-control" name="timeStart" placeholder="Select time" required>
                    </div> 
                    </div>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                    <label class="control-label term1 col-md-12"> Select End Time</label>
                    <div class="form-group row">
                    <div class="col-md-12">
                    <div class="input-group">
                    <input type="time" class="form-control" name="timeEnd" placeholder="Select time" required>
                    </div> 
                    </div>
                    </div>
                    </div>
                    </div>



                    <div class="row">
                    <div class="col-md-12">
                    <label class="control-label term1 col-md-12">Select Client </label>

                    <div class="form-group row">
                    <div class="col-md-12">
                    <div class="input-group">
                    <select class="form-control custom-select" name="client_id">
                     @foreach($systemclients as $spc)

                    <option value="{{$spc->id}}"><td>{{$spc->client_name}}</td></option>
                    @endforeach
                     
                    </select> 
                    <i class="mdi mdi-account-convert icon1"></i>
                    </div>    
                    </div>
                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-md-12">
                    <label class="control-label term1 col-md-12">Select IntakeCoordinator</label>

                    <div class="form-group row">
                    <div class="col-md-12">
                    <div class="input-group">
                    <select class="form-control custom-select" name="caregiver_id">

                    @foreach($intakecordinator as $spc)

                    <option value="{{$spc->id}}"><td>{{$spc->intake_name}}</td></option>
                    @endforeach

                    </select> 
                    <i class="mdi mdi-account-convert icon1"></i>
                    </div>  
                    </div>
                    </div>
                    </div>
                    </div>
                <hr>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="regbtn2 form-control">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            </form>
    </div>
                      
            </div>

          </div>
        </div>
      </div>

  </div>
</div>
        </section>
    </div>
</div>
@endsection
