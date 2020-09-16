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
                        <img  src="{{url('public/clients/'.$details->image)}}"  width="50"; height="50">
                        @else
                        <img src="{{url('public/images/person.png')}}" alt="view" class="img-circle" style="height: 50px">
                        @endif
                    </span>
                </div>
                <div class="userhead1 abl1">
                    <h6>{{$details->intake_name}}</h6>
                    <span class="edit1 mt-0">{{$details->location}}</span><br>
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
                <div class="userhead1 abl1">
                   <a href="{{url('addtask')}}"> <button type="submit" class="resetbtn">ADD SCHEDULE</button></a>
                </div>
            </div>

        </div>

    </div>
<!-- Edit Profile Tab menu -->
<nav>
    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
        <a class="nav-item nav-link tab_css term1 active" id="nav-schedule-tab" data-toggle="tab" href="#nav-schedule" role="tab" aria-controls="nav-schedule" aria-selected="false">All schedules</a>

        <a class="nav-item nav-link tab_css term1" id="nav-Profile-tab" data-toggle="tab" href="#nav-Profile" role="tab" aria-controls="nav-Profile" aria-selected="false">Edit Profile</a>

        <a class="nav-item nav-link tab_css term1" id="nav-Assessment-tab" data-toggle="tab" href="#nav-Assessment" role="tab" aria-controls="nav-Assessment" aria-selected="true">Contact Details</a>

        <!--<a class="nav-item nav-link tab_css" id="nav-Notes-tab" data-toggle="tab" href="#nav-Notes" role="tab" aria-controls="nav-Notes" aria-selected="false">Notes</a>-->

        <a class="nav-item nav-link tab_css term1" id="nav-Safety-tab" data-toggle="tab" href="#nav-Safety" role="tab" aria-controls="nav-Safety" aria-selected="false">Pay Roll</a>

        <!--<a class="nav-item nav-link tab_css term1" id="nav-Caregiver-tab" data-toggle="tab" href="#nav-Caregiver" role="tab" aria-controls="nav-Caregiver" aria-selected="false">Pay Roll Rates</a>-->

    

        <!--<a class="nav-item nav-link tab_css term1" id="nav-Policy-tab" data-toggle="tab" href="#nav-Policy" role="tab" aria-controls="nav-Policy" aria-selected="false">Weekly surveys</a>-->
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
                     <h4>All Meetings</h4>
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
              <button type="submit" class="btn regbtn2">Search</button>

            </div>-->
        </div>
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
                <div class="h5">
                <h5 class="text-white">{{ $newDate  }}<span><i class="mdi mdi-account ml-5"></i></span> </h5>

                </div>
                </div>
                <div class="card-body">
                <div class="">
                <span class="term4">Client INFORMATION</span>
                </div>
                <div class="mt-3">
                <span class="term1"><i class="mdi mdi-account-location"></i> {{$row->address}} </span>
                </div>
                <div class="mt-3">
                <span class="term1"> <i class="mdi mdi-account-location"></i> {{$row->phone}}</span>
                </div>
                <div class="mt-3">
                <center>
                <button type="button" class="regbtn2 form-control" name=""><i class="mdi mdi-account-location"></i> MAP</button>
                </center>
                </div>
                </div>
                </div>
        </div>
         @endforeach
    </div>

</div>
<!-- profile tab menu -->

<div class="tab-pane fade show fade" id="nav-Profile" role="tabpanel" aria-labelledby="nav-Profile-tab">

     <div class="card card-outline-info">
            <div class="card-header clrcss1 text-white">
              <h3 class="text-white fontfamily">Edit IntakeCoordinator </h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('updateintakecoprofile') }}" class="form-horizontal" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="name"  placeholder="Enter Name" value="{{$details->intake_name}}" required>
                                <small class="form-control-feedback"> </small> </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group has-danger row">
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
      <!--           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Caregiver</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select" name="caregiver_id">
                                     @foreach($caregivers as $spc)

                                    <option value="{{$spc->id}}"><td>{{$spc->name}}</td></option>
                                    @endforeach
                                </select>
                                <small class="form-control-feedback"></small> </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Clients</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select" name="client_id">
                                     @foreach($activeclients as $spc)

                                    <option value="{{$spc->id}}"><td>{{$spc->client_name}}</td></option>
                                    @endforeach
                                </select>
                                <small class="form-control-feedback"></small> </div>
                        </div>
                    </div>

                     
                </div> -->
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Classification</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="classification" placeholder="Enter Classification" value="{{$details->classification}}">
                            </div>
                        </div>
                    </div>
                   
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
                </div> 
                <div class="row">
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
                            <label class="control-label text-right col-md-3">Payroll</label>
                            <div class="col-md-9">
                                 <input type="text" class="form-control" name="intakeco_payroll" placeholder="Enter Classification" value="{{$details->intakeco_payroll}}">
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
    
<!-- Contact tab menu -->

<div class="tab-pane fade show fade" id="nav-Assessment" role="tabpanel" aria-labelledby="nav-Assessment-tab">


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
        <textarea type="text" name="latitude" id="demo" style="display: none;">  </textarea>
        <textarea type="text" name="longitude" id="demo2" style="display: none;"></textarea>
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
            <label>{{$details->intake_name}}</label>
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

<!-- payroll tab menu -->

<div class="tab-pane fade show fade" id="nav-Safety" role="tabpanel" aria-labelledby="nav-Safety-tab">

  
   <div class="col-md-8 center1">
   <div class="mt-5">
      <div class="card stylecard" >
    <div class="card-header clrcss1 text-white">
                    <h3 class="text-white fontfamily">Payroll </h3>
                </div>
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
                    <td>{{$details->intake_name}}</td>
                    <td>${{$details->intakeco_payroll}} USD</td>
                  
                  </tr>
                   
                </tbody>
              </table>
            </div>
          </div>
            </div>
        </div>
    </div>

</div>


<!-- Payroll rates tab menu -->

<div class="tab-pane fade show fade" id="nav-Caregiver" role="tabpanel" aria-labelledby="nav-Caregiver-tab">

  <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Payroll Rates</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                  </tr>
                  <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                  </tr>
                 
                  <tr>
                    <td>Brielle Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2012/12/02</td>
                    <td>$372,000</td>
                  </tr>
                  <tr>
                    <td>Herrod Chandler</td>
                    <td>Sales Assistant</td>
                    <td>San Francisco</td>
                    <td>59</td>
                    <td>2012/08/06</td>
                    <td>$137,500</td>
                  </tr>
                  <tr>
                    <td>Rhona Davidson</td>
                    <td>Integration Specialist</td>
                    <td>Tokyo</td>
                    <td>55</td>
                    <td>2010/10/14</td>
                    <td>$327,900</td>
                  </tr>
                  <tr>
                    <td>Colleen Hurst</td>
                    <td>Javascript Developer</td>
                    <td>San Francisco</td>
                    <td>39</td>
                    <td>2009/09/15</td>
                    <td>$205,500</td>
                  </tr>
                  <tr>
                    <td>Sonya Frost</td>
                    <td>Software Engineer</td>
                    <td>Edinburgh</td>
                    <td>23</td>
                    <td>2008/12/13</td>
                    <td>$103,600</td>
                  </tr>
                  <tr>
                    <td>Jena Gaines</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>30</td>
                    <td>2008/12/19</td>
                    <td>$90,560</td>
                  </tr>
                  <tr>
                    <td>Quinn Flynn</td>
                    <td>Support Lead</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2013/03/03</td>
                    <td>$342,000</td>
                  </tr>
                  <tr>
                    <td>Charde Marshall</td>
                    <td>Regional Director</td>
                    <td>San Francisco</td>
                    <td>36</td>
                    <td>2008/10/16</td>
                    <td>$470,600</td>
                  </tr>
                  <tr>
                    <td>Haley Kennedy</td>
                    <td>Senior Marketing Designer</td>
                    <td>London</td>
                    <td>43</td>
                    <td>2012/12/18</td>
                    <td>$313,500</td>
                  </tr>
                  <tr>
                    <td>Tatyana Fitzpatrick</td>
                    <td>Regional Director</td>
                    <td>London</td>
                    <td>19</td>
                    <td>2010/03/17</td>
                    <td>$385,750</td>
                  </tr>
                  <tr>
                    <td>Michael Silva</td>
                    <td>Marketing Designer</td>
                    <td>London</td>
                    <td>66</td>
                    <td>2012/11/27</td>
                    <td>$198,500</td>
                  </tr>
        
                  <tr>
                    <td>Donna Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                    <td>$112,000</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
</div>






<!-- Weekly Servay tab menu -->

<div class="tab-pane fade show fade" id="nav-Policy" role="tabpanel" aria-labelledby="nav-Policy-tab">
  <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Weekly Servay</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Time</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Time</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                  </tr>
                  <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                  </tr>
                  <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                  </tr>
                  <tr>
                    <td>Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td>$433,060</td>
                  </tr>
                  <tr>
                    <td>Airi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td>$162,700</td>
                  </tr>
                  <tr>
                    <td>Brielle Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2012/12/02</td>
                    <td>$372,000</td>
                  </tr>
  
                  <tr>
                    <td>Jena Gaines</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>30</td>
                    <td>2008/12/19</td>
                    <td>$90,560</td>
                  </tr>
                  <tr>
                    <td>Quinn Flynn</td>
                    <td>Support Lead</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2013/03/03</td>
                    <td>$342,000</td>
                  </tr>
                  <tr>
                    <td>Charde Marshall</td>
                    <td>Regional Director</td>
                    <td>San Francisco</td>
                    <td>36</td>
                    <td>2008/10/16</td>
                    <td>$470,600</td>
                  </tr>
                  <tr>
                    <td>Haley Kennedy</td>
                    <td>Senior Marketing Designer</td>
                    <td>London</td>
                    <td>43</td>
                    <td>2012/12/18</td>
                    <td>$313,500</td>
                  </tr>
                  <tr>
                    <td>Tatyana Fitzpatrick</td>
                    <td>Regional Director</td>
                    <td>London</td>
                    <td>19</td>
                    <td>2010/03/17</td>
                    <td>$385,750</td>
                  </tr>
                  <tr>
                    <td>Michael Silva</td>
                    <td>Marketing Designer</td>
                    <td>London</td>
                    <td>66</td>
                    <td>2012/11/27</td>
                    <td>$198,500</td>
                  </tr>
        
                  <tr>
                    <td>Donna Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                    <td>$112,000</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAglpCcbgGXswM-slodw-d5J6FO-oXwie8&callback=initAutocomplete&libraries=places&v=weekly"
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
    
    
    <script>
      var x = document.getElementById("demo");
      var y = document.getElementById("demo2");


      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
          x.innerHTML = "Geolocation is not supported by this browser.";
        }
      }

      function showPosition(position) {
        x.innerHTML = position.coords.latitude;
        y.innerHTML =  position.coords.longitude;


        var myMapCenter = new google.maps.LatLng(position.coords.latitude,  position.coords.longitude);
        var myMapProp = {center:myMapCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
        var map = new google.maps.Map(document.getElementById("map"),myMapProp);
        var marker = new google.maps.Marker({position:myMapCenter});
        marker.setMap(map);


      }
    </script>


@endsection
