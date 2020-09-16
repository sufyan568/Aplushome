@extends('layouts.admin_header')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<div class="page-wrapper">
    <div class="container-fluid">



<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
    <!--  schedules tab menu -->
    <div class="tab-pane fade show active" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
    <div class="card cardclr1">
        <div class="card-body">
            <div class="d-flex no-block">
                <div class="abl1">
                    <span class="round round-danger">
                         @if($details->image)
                        <img  src="{{url('public/clients/'.$details->image)}}"   width="50px" height="50px">
                        @else
                        <img src="{{url('public/images/person.png')}}" alt="view" class="img-circle" style="height: 50px">
                        @endif
                    </span>
                </div>
                <div class="userhead1 abl1">
                    <h6>{{$details->name}}</h6>
                    <span class="edit1 text-muted mt-0">{{$details->location}}</span><br>
                </div>
                <div class="userhead1">
                    <hr class="hr1" style="">
                </div>
                <div class="userhead1 abl1">
                    <span class="edit1">{{$details->email}}</span><br>
                    <span class="edit1">{{$details->phone}}</span><br>
                    <span class="edit1">Classification: {{$details->classification}}</span>

                </div>
                <div class="userhead1">
                    <hr class="hr1" style="">
                </div>
                <div class="userhead1 abl1">
                    <a class="edit1" href="https://www.google.com/maps">VIEW MAPS</a>
                    

                </div>
                <div class="userhead1">
                    <hr class="hr1" style="">
                </div>
                <div class="userhead1 abl1"><a href="{{ route('addtask') }}">
                    <button type="submit" class="resetbtn">ADD SCHEDULE</button>
                </a>
                </div>
            </div>

        </div>

    </div>
<!-- Edit Profile Tab menu -->
<nav>
    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
        <a class="nav-item nav-link tab_css active" id="nav-schedule-tab" data-toggle="tab" href="#nav-schedule" role="tab" aria-controls="nav-schedule" aria-selected="false">All schedules</a>

        <a class="nav-item tab_css nav-link" id="nav-Profile-tab" data-toggle="tab" href="#nav-Profile" role="tab" aria-controls="nav-Profile" aria-selected="false">Edit Profile</a>

        <a class="nav-item tab_css nav-link" id="nav-Assessment-tab" data-toggle="tab" href="#nav-Assessment" role="tab" aria-controls="nav-Assessment" aria-selected="true">Skill's & Certifications</a>

        <!--<a class="nav-item tab_css nav-link" id="nav-Caregiver-tab" data-toggle="tab" href="#nav-Caregiver" role="tab" aria-controls="nav-Caregiver" aria-selected="false">Caregiver Preference</a>-->

        <a class="nav-item tab_css nav-link" id="nav-Contact-tab" data-toggle="tab" href="#nav-Contact" role="tab" aria-controls="nav-Contact" aria-selected="false">Contact Details</a>

        <a class="nav-item nav-link tab_css" id="nav-Notes-tab" data-toggle="tab" href="#nav-Notes" role="tab" aria-controls="nav-Notes" aria-selected="false">Notes</a>

        <a class="nav-item tab_css nav-link" id="nav-Billing-tab" data-toggle="tab" href="#nav-Billing" role="tab" aria-controls="nav-Billing" aria-selected="false">Payroll Rates</a>

        <a class="nav-item tab_css nav-link" id="nav-Policy-tab" data-toggle="tab" href="#nav-Policy" role="tab" aria-controls="nav-Policy" aria-selected="false">Weekly surveys</a>
    </div>
</nav>
           <!-- Tab menus -->
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <!--  schedules tab menu -->
        <div class="tab-pane fade show active" id="nav-schedule" role="tabpanel" aria-labelledby="nav-schedule-tab">
            <div class="card bg-light">
                       <div class="card-body w-100 mt-3">
                 <div class="row p-1">
                    <div class="col-md-3">
                     <h4>All Schedule</h4>
                 </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                 <div class="row">
            
            <input type="text" id="myInput" placeholder="Find people by name" class="form-control">
            </div>
            </div>
    
        </div>
    </div>

    <div class="row">

        @foreach($schedule as $row)
        <?php 
        $newDate = date("l jS \of F", strtotime($row->date))
        ?>
        <div class="col-lg-4 m-auto">
                <div class="card" style="width: 100%;">

                <div class="card-header clrcss1 text-white bgcardcolor">
                <div class="h5">
                <h5>{{ $newDate  }}<span><i class="mdi mdi-account ml-5"></i></span> </h5>

                </div>
                </div>
                <div class="card-body">
                <div class="">
                <span class="term4">CAREGIVER INFORMATION</span>
                </div>
                <div class="mt-3">
                <span class="term1"><i class="mdi mdi-account-location"></i> {{$row->address}} </span>
                </div>
                <div class="mt-3">
                <span class="term1"> <i class="mdi mdi-account-location"></i> {{$row->phone}}</span>
                </div>
                <div class="mt-3">
                <center>
               <button type="button" class="regbtn1 form-control" name=""><i class="mdi mdi-account-location"></i> MAP</button>
                </center>
                </div>
                </div>
                </div>
        </div>
         @endforeach
    </div>

</div>
</div>
<!-- profile tab menu -->

<div class="tab-pane fade show fade" id="nav-Profile" role="tabpanel" aria-labelledby="nav-Profile-tab">

     <div class="card card-outline-info">
    <div class="card-header clrcss1 fontfamily">
        <h4 class="m-b-0 text-white  fontfamily ">Edit Caregiver</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('updatecaregiverprofile') }}" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
           <input type="hidden" name="id" value="{{$details->id}}">
           <input type="hidden" name="image" value="{{$details->image}}">

            <div class="form-body">
                <hr class="m-t-0 m-b-40">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3"> Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name"  placeholder="Enter Name" value="{{$details->name}}" required>
                                <small class="form-control-feedback"> </small> </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group   row">
                            <label class="control-label text-right col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{$details->email}}" required>
                                <small class="form-control-feedback"></small> </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Gender</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <small class="form-control-feedback"></small> </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Phone</label>
                            <div class="col-md-9">
                                <input type="text" value="{{$details->phone}}" class="form-control" +++++placeholder="Enter Phone" name="phone" required>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                   
                    <div class="col-md-6">
                    <div class="form-group row">
                    <label class="control-label text-right col-md-3">Payroll</label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" name="caregiver_payroll" value="{{$details->caregiver_payroll}}">
                    <small class="form-control-feedback"></small> </div>
                    </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Profile Image</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control"  name="image" >                   
                                 </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    
                @if($details->intakeco_name)    
                    
                  <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Assigned IntakeCo</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  value="{{$details->intake_name}}" readonly>
                            </div>
                        </div>
                    </div>
               @endif        

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Intake Co</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select" name="intakeco_id">
                                    <option value="0"><td>Update IntakeCoordinator</td></option>
                                     @foreach($activeintakeco as $spc)
                                  
                                    <option value="{{$spc->id}}"><td>{{$spc->intake_name}}</td></option>
                                    @endforeach
                                </select>
                                <small class="form-control-feedback"></small> </div>
                        </div>
                    </div>

                    

                     
                </div>
                <div class="row">

                   
                   
                    <!--/span-->
                   <!--  <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Status</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Deactivate</option>
                                </select>
                                <small class="form-control-feedback"></small> </div>
                        </div>
                    </div> -->

                  <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Address</label>
                            <div class="col-md-9">
                                
                                 <input type="text" id="pac-input" class="form-control iptx" name="address" value="{{$details->address}}">
                                 <div id="map" class="" style="height:150px;"></div>
                            </div>
                        </div>
                </div> 
                
                
                <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Classification</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="classification" placeholder="Enter Classification" value="{{$details->classification}}">
                            </div>
                        </div>
                    </div>
                
               

                </div>   
                                               
            </div>
            <hr>
           <div class="form-actions">
                <div class="row">
                            <div class="ml-5">
                                <button type="submit" class="btn regbtn2">Submit</button>
                                </div>&nbsp;&nbsp;
                                <div>
                                <button type="button" class="btn cancelbtn">Cancel</button>
                              </div>
                          </div>
            </div>
        </form>
    </div>
    </div>
    </div>
    
<!-- Assessment tab menu -->

<div class="tab-pane fade show fade" id="nav-Assessment" role="tabpanel" aria-labelledby="nav-Assessment-tab">

      @foreach($certificates as $row)  
        <div class="ml-3">
        <br>
         <a href="{{url('/certificatedownload/'.$row->caregiver_id)}}">
        <img src="{{url('public/images/doc.png')}}" alt="view" class="img-circle" style="height: 50px">
        </a>
        </div>
        @endforeach
</div>  
  


<!-- Caregiver tab menu -->

<div class="tab-pane fade show fade" id="nav-Caregiver" role="tabpanel" aria-labelledby="nav-Caregiver-tab">


   <div class="col-md-8 center1">
   <div class="mt-5">
      <div class="card stylecard" >
    <div class="card-header clrcss1 text-white">
                    <h3 class="text-white fontfamily">Caregiver Preference </h3>
                </div>
                <div class="card-body">
                    <form role="form">
                    <div class="form-group">
                        <label for="cardNumber" class="fontfamily">
                            Hourly Rates</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Hourly Rates"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                       <div class="form-group">
                        <label for="cardNumber" class="fontfamily">
                            Weekly Rates</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Weekly Rates"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                      <div class="form-group">
                        <label for="cardNumber" class="fontfamily">
                            Monthly Rates</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Monthly Rates"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                 
                   <button type="submit" class="btn regbtn2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Contact tab menu -->

<div class="tab-pane fade show fade" id="nav-Contact" role="tabpanel" aria-labelledby="nav-Contact-tab">

 <div class="col-md-8 center1">
   <div class="mt-5">
    <center>
      <div class="card stylecard" >
            <div class="card-header clrcss1 text-white">
                    <h3 class="text-white fontfamily">Contact Details </h3>
                </div>
         <form action="" method="post" enctype="multipart/form-data">
                        @csrf
        <input type="hidden" class="abcd1 form-control" name="id" value="" >
        <input type="hidden" class="abcd1 form-control" name="oldimage" value="" >

        <div class="abl1 mt-3">
            <span class="round round-danger">
            @if($details->image)
            <img  src="{{url('public/clients/'.$details->image)}}"  width="100px"height="100px">
            @else
            <img src="{{url('public/images/person.png')}}" alt="view" class="img-circle" style="height: 50px">
            @endif
            </span>
            </div>

        <div class="card-body cardcolor text-left">
         
            

        <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
        <label for="Email" class="text-left ">Name</label>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
            <label>{{$details->name}}</label>
         </div>
        </div>

        <div class="row mt-2">
        <div class="col-md-3 col-sm-12 col-xs-12">
        <label for="Name" class="text-left control-label">Email</label>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
              <label>{{$details->email}}</label>

         </div>
        </div>


        <div class="row mt-2">
        <div class="col-md-3 col-sm-12 col-xs-12">
        <label for="Name" class="text-left control-label">Gender</label>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
              <label>{{$details->gender}}</label>
        </div>    
        </div>

      <div class="row mt-2">
      <div class="col-md-3 col-sm-12 col-xs-12">
      <label for="Name" class="control-label">Phone</label>
      </div>
      <div class="col-md-8 col-sm-12 col-xs-12">
              <label>{{$details->phone}}</label>
      </div>
      </div>

      <div class="row mt-2 ">
      <div class="col-md-3 col-sm-12 col-xs-12">
      <label for="Name" class="control-label">Address</label>
      </div>
      <div class="col-md-8 col-sm-12 col-xs-12">
              <label>{{$details->address}}</label>
      </div>          
      </div>

   
 
</div>
</form>
</div>  
</center>
</div>

</div>
</div>


<!-- Notes -->

<div class="tab-pane fade show fade" id="nav-Notes" role="tabpanel" aria-labelledby="nav-Notes-tab">
@foreach($notes as $row)  
<div class="ml-3">
 <br>
<p class="term1">{{$row->message}}</p>
<a href="{{url('/notesdownload/'.$row->id)}}">
<img src="{{url('public/images/doc.png')}}" alt="view" class="img-circle" style="height: 50px">
</a>
</div>
@endforeach
 </div>
<!-- Payroll  tab menu -->

<div class="tab-pane fade show fade" id="nav-Billing" role="tabpanel" aria-labelledby="nav-Billing-tab">
   
  <div class="card mb-3">
            <div class="card-header clrcss1 text-white">Payroll Rates</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Payroll</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  <tr>
                    <td>{{$details->name}}</td>
                    <td>${{$details->caregiver_payroll}} USD</td>
                  
                  </tr>
                   
                </tbody>
              </table>
            </div>
          </div>
           
        </div>

</div>


<!-- Policy tab menu -->

<div class="tab-pane fade show fade" id="nav-Policy" role="tabpanel" aria-labelledby="nav-Policy-tab">

  <div class="card mb-3">
            <div class="card-header clrcss1 text-white">Weekly Surver </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>No of Survey</th>
                    
                  </tr>
                </thead>
                 
                <tbody>
                  <tr>
                    <td>{{$details->name}}</td>
                    <td>{{$surveycount}}</td>
                    
                  </tr>
                
                </tbody>
              </table>
            </div>
          </div>
           
</div>


</div>
</div>




</div>
            </div>

        </div>
    </div>

    @endsection
    <!-- ============================================================== -->
    @section('javascript')

    <script>
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

     <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV4e70mCyFfS8PwRyzB6GX3pCzSvvetgY&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>

          <script src="{{ asset('public/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('public/assets/plugins/bootstrap/js/popper.min.html') }}"></script>
    <script src="{{ asset('public/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('public/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('public/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('public/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('public/js/custom.min.js') }}"></script>
    
    <!-- This page plugins -->
    
    <!--sparkline JavaScript -->
    <script src="{{ asset('public/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--morris JavaScript -->
    <script src="{{ asset('public/assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/morrisjs/morris.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('public/js/dashboard1.js') }}"></script>
    
    <!-- Style switcher -->
    
    <script src="{{ asset('assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>


@endsection
