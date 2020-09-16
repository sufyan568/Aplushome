@extends('layouts.admin_header')
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">



<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
    <!--  schedules tab menu -->
    <div class="tab-pane fade show active" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
    <div class="card cardclr1">
        <div class="card-body rpd12">
            <div class="d-flex no-block">
                <div class="abl1">
                    <span class="round round-danger">
                         @if($details->image)
                        <img  src="{{url('public/images/person.png')}}"  width="50">
                        @else
                        <img src="{{url('public/images/person.png')}}" alt="view" class="img-circle" style="height: 50px">
                        @endif
                    </span>
                </div>
                <div class="abl1 userhead1">
                    <h6>{{$details->client_name}}</h6>
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
                <div class="userhead1 abl1"><a class="edit1" href="{{url('profiledetails/'.$details->id)}}">Deactivate</a>
                </div>
                <div class="userhead1">
                    <hr class="hr1" style="">
                </div>
                <div class="userhead1 abl1">
                    <a href="{{ route('addtask') }}">
                    <button type="submit" class="resetbtn">ADD SCHEDULE</button>
                </a>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- Edit Profile Tab menu -->
<nav>
    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
        <a class="nav-item nav-link tab_css active" id="nav-schedule-tab" data-toggle="tab" href="#nav-schedule" role="tab" aria-controls="nav-schedule" aria-selected="false">All schedules</a>

        <a class="nav-item nav-link tab_css" id="nav-Profile-tab" data-toggle="tab" href="#nav-Profile" role="tab" aria-controls="nav-Profile" aria-selected="false">Edit Profile</a>

        <a class="nav-item nav-link tab_css" id="nav-Assessment-tab" data-toggle="tab" href="#nav-Assessment" role="tab" aria-controls="nav-Assessment" aria-selected="true">Assessment Home Safety</a>

        <a class="nav-item nav-link tab_css" id="nav-Safety-tab" data-toggle="tab" href="#nav-Safety" role="tab" aria-controls="nav-Safety" aria-selected="false">MCO</a>

        <!--<a class="nav-item nav-link tab_css" id="nav-Caregiver-tab" data-toggle="tab" href="#nav-Caregiver" role="tab" aria-controls="nav-Caregiver" aria-selected="false">Caregiver Preference</a>-->

        <a class="nav-item nav-link tab_css" id="nav-Contact-tab" data-toggle="tab" href="#nav-Contact" role="tab" aria-controls="nav-Contact" aria-selected="false">Contact Details</a>

      <!--   <a class="nav-item nav-link tab_css" id="nav-Notes-tab" data-toggle="tab" href="#nav-Notes" role="tab" aria-controls="nav-Notes" aria-selected="false">Notes</a> -->

        <a class="nav-item nav-link tab_css" id="nav-Billing-tab" data-toggle="tab" href="#nav-Billing" role="tab" aria-controls="nav-Billing" aria-selected="false">Billing</a>

       <!--  <a class="nav-item nav-link tab_css" id="nav-Policy-tab" data-toggle="tab" href="#nav-Policy" role="tab" aria-controls="nav-Policy" aria-selected="false">Billing Policy</a> -->
    </div>
</nav>
           <!-- Tab menus -->
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <!--  schedules tab menu -->
        <div class="tab-pane fade show active" id="nav-schedule" role="tabpanel" aria-labelledby="nav-schedule-tab">
            <div class="card bg-light">
                <div class="card-body mt-3">
                 <div class="row p-1">
                    <div class="col-md-3">
                     <h4>All Schedule</h4>
                 </div>
                   <!-- <div class="col-md-6">
                 <div class="row">
                    <div class="col-sm-3">
                    <label class="lbl2 mt-2 float-right">Date:</label>
                    </div>
                    <div class="col-sm-9">
                    <input type="text" id="myInput" placeholder="Find people by name" class="form-control">
                </div>
            </div>
            </div>-->
           <!-- <div class="col-md-3">
              <button type="submit" class="btn regbtn2">Date</button>

            </div>-->
        </div>
    </div>

    <div class="row m-auto">

        @foreach($schedule as $row)
        <?php 
        $newDate = date("l jS \of F", strtotime($row->date))
        ?>
        <div class="col-lg-4 m-auto">
                <div class="card">

                <div class="card-header clrcss1 text-white bgcardcolor">
                <div class="h5 text-white">
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

     <div class="card card-outline-info ">
    <div class="card-header clrcss1 fontfamily text-white">
        <h4 class="m-b-0 text-white fontfamily">Edit Client</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('updateclientprofile') }}" class="form-horizontal" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="name"  placeholder="Enter Name" value="{{$details->client_name}}" required>
                                <small class="form-control-feedback"> </small> </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group  row">
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
                            <label class="control-label text-right col-md-3">Address</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter Address" name="address" value="{{$details->address}}" required>
                            </div>
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
                   
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Status</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Deactivate</option>
                                </select>
                                <small class="form-control-feedback"></small> </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Hourly Rate</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="payroll" value="{{$details->payroll}}" placeholder="Enter Rate perhour">
                                <small class="form-control-feedback"></small> </div>
                        </div>
                    </div>

                </div> 
                   
                <div class="row">
                          
                  <!--   <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Caregiver</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select" name="caregiver_id">
                                     @foreach($activecaregivers as $spc)

                                    <option value="{{$spc->id}}"><td>{{$spc->name}}</td></option>
                                    @endforeach
                                </select>
                                <small class="form-control-feedback"></small> </div>
                        </div>
                    </div> -->

                     <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Classification</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="classification" placeholder="Enter Classification" value="{{$details->classification}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
              <!--       <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Commision</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="commision" placeholder="Enter Commision %age" value="{{$details->commision}}">
                            </div>
                        </div>
                    </div> -->
<!-- 
                
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Start Date</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="startdate" placeholder="Enter Start Date" value="{{$details->startdate}}">
                            </div>
                        </div>
                    </div>
 -->
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
<div class="card p-5">
<form action="{{route('homeassesment')}}" method="POST" accept-charset="utf-8">
                {{ csrf_field() }}
<input type="hidden" name="client_id" value="{{$details->id}}" class="iptx form-control">
<div class="card-body">
<div>
<h3 class="hd12">Home Safety Assessment</h3>
</div>
<div>
<input type="text" name="description" class="iptx form-control">
</div>
</div>
<div class="card-body">
<div>
<h5 class="instr1">General</h5>
</div>
<div class="row">
<div class="ml-4">
<input type="checkbox"   name="installation" value="1">
<label class="sm12">Install smoke and carbon monoxide alarms throughout your home.
</label>

</div>
</div>
<div class="row">
<div class="ml-4">

<input type="checkbox"  name="escape_plan" value="1">
<label class="sm12">Have an emergency escape plan & pre-arrange for a family member or caregiver to help you escape if needed .
</label>
</div>
</div>
<div class="row">
<div class="ml-4">
<input type="checkbox"name="fine" value="1">
<label class="sm12">Keep a fire extinguisher handy in the kitchen in case of fire.
</label>
</div>
</div>
<div class="row">
<div class="ml-4">
<input type="checkbox"name="lighting" value="1" >
<label class="sm12">Make sure there is good lighting inside and outside your home to help prevent falls
</label>
</div>
</div>
<div class="row">
<div class="ml-4">
<input type="checkbox" name="others" value="1">
<label class="sm12">Make sure there is good lighting inside and outside your home to help prevent falls
</label>
</div>
</div>

</div>
<div class="row">
<div class="ml-4">
<input type="submit" class="regbtn1">
</div>
</div>
</form>
</div>
</div>


<!-- Safety tab menu -->

<div class="tab-pane fade show fade" id="nav-Safety" role="tabpanel" aria-labelledby="nav-Safety-tab">

    <div class="card p-5">
<form action="{{route('mco')}}" method="POST" accept-charset="utf-8">
    {{ csrf_field() }}
<input type="hidden" name="client_id" value="{{$details->id}}" class="iptx form-control">
<div class="card-body">
<div class="row">
<h3 class="hd12">MCO</h3>
</div>
<div class="row mt-3">
<div class="col-md-6">
<div class="form-group">
<label class="control-label text-right ">Renewal Date</label>
<div class="">
<input type="date" class="form-control iptx" name="date" placeholder="22/03/2020" value="">
</div>
</div>
</div>
</div>
<div class="row">
<h3 class="hd12">Intake Cordinator Information</h3>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label text-right">Intak CO. Name</label>
<div class="">
<input type="text" class="form-control iptx" name="intakeco_name" placeholder="Adams Felps" value="">
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label text-right">Phone Number</label>
<div class="">
<input type="Number" class="form-control iptx" name="phone" placeholder="+00-1111111222" value="">
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="submit" class="regbtn2" value="Save">
</div>

</div>
</div>
</form>
</div>
</div>


<!-- Caregiver tab menu -->

<div class="tab-pane fade show fade" id="nav-Caregiver" role="tabpanel" aria-labelledby="nav-Caregiver-tab">

 <div class="card">

<div class="card-body">
<div class="table-responsive">
<table class="table table-hover earning-box">
<thead class="bg-light">
    <tr>
        <th colspan="2">Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Client</th>
        <th>Intake CO.</th>
        <th>Classifications</th>
        <th>Hourly Rate</th>

         <th>Ratings</th>


    </tr>
</thead>
<tbody>                                   
        <tr>
          @foreach($data as $row)  
        <td><span>
                @if($row->image)
                <img src="{{url('public/clients/'.$row->image)}}" alt="user" width="50">
                @else
                <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px">
                @endif
            </span></td>
        <td>
        <h6>{{$row->name}}</h6><small class="text-muted"> 
         {{$row->location}}
        </small></td>
        <td><span class="label label-warning">{{$row->email}}</span></td>
        <td>{{$row->phone}}</td>
        <td> </td>
        <td> </td>
        <td>{{$row->classification}}</td>
        <td>{{$row->caregiver_payroll}}</td>


        <td>
        <div class="rating">
        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
        </div>
        </td>
        </tr>
        @endforeach
        
            </tbody>
        </table>
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
        <form action="" method="post" enctype="multipart/form-data">
                        @csrf
        <input type="hidden" class="abcd1 form-control" name="id" value="" >
        <input type="hidden" class="abcd1 form-control" name="oldimage" value="" >

        <div class="abl1 mt-3">
            <span class="round round-danger">
            @if($details->image)
            <img  src="{{url('public/clients/'.$row->image)}}"  width="50">
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
            <label>{{$details->client_name}}</label>
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
 
Add Notes
 </div>
<!-- Billing tab menu -->

<div class="tab-pane fade show fade" id="nav-Billing" role="tabpanel" aria-labelledby="nav-Billing-tab">
 
     <div class="col-md-8 center1">
   <div class="mt-5">
      <div class="card stylecard" >
    <div class="card-header clrcss1 text-white">
                    <h3 class="text-white fontfamily">Payment Details</h3>
                </div>
                <div class="card-body">
                    <form role="form">
                    <div class="form-group">
                        <label for="cardNumber" class="fontfamily">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <div class="form-group">
                                <label for="expityMonth " class="fontfamily">EXPIRY DATE</label>
                                    <div class="row">
                                    <input type="text" class="form-control ml-3 col-md-3" id="expityMonth" placeholder="MM" required /> &nbsp;&nbsp;
                             <input type="text" class="form-control col-md-3" id="expityYear" placeholder="YY" required />
                            </div>
                        </div>
                        </div>
                        <div class="col-xs-6 col-md-6 pull-right">
                            <div class="form-group">
                                <label for="cvCode" class="fontfamily">CV CODE</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>
                   <button type="submit" class="btn regbtn2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Policy tab menu -->

<div class="tab-pane fade show fade" id="nav-Policy" role="tabpanel" aria-labelledby="nav-Policy-tab">
  <div class="col-md-8 center1">
   <div class="mt-5">
      <div class="card stylecard" >
    <div class="card-header clrcss1 text-white">
                    <h3 class="text-white fontfamily">Payment Details</h3>
                </div>
                <div class="card-body">
                    <form role="form">
                    <div class="form-group">
                        <label for="cardNumber" class="fontfamily">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <div class="form-group">
                                <label for="expityMonth " class="fontfamily">EXPIRY DATE</label>
                                    <div class="row">
                                    <input type="text" class="form-control ml-3 col-md-3" id="expityMonth" placeholder="MM" required /> &nbsp;&nbsp;
                             <input type="text" class="form-control col-md-3" id="expityYear" placeholder="YY" required />
                            </div>
                        </div>
                        </div>
                        <div class="col-xs-6 col-md-6 pull-right">
                            <div class="form-group">
                                <label for="cvCode" class="fontfamily">CV CODE</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>
                   <button type="submit" class="btn regbtn2">Submit</button>
                    </form>
                </div>
            </div>
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
