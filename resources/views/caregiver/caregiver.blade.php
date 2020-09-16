@extends('layouts.admin_header')
@section('content')
<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <div class="container-fluid">

        <section id="tabs">
            <div class="container">
          @if(session('message'))
           <p class="alert alert-danger" style="background-color: pink !important;">
           {{session('message')}}</p>
           @endif
                <h6 class="section-title h2 pt-5">Caregivers</h6>
                <div class="row">
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link tab_css active" id="nav-detail-tab" data-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">All Caregiver</a>
                               <!-- <a class="nav-item tab_css nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Add Caregivers</a>-->
                                <a class="nav-item tab_css nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Newly Added</a>
                                <a class="nav-item tab_css  nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Order Background Checks</a>

                               <!-- <a class="nav-item tab_css nav-link" id="nav-contact2-tab" data-toggle="tab" href="#nav-contact2" role="tab" aria-controls="nav-contact" aria-selected="false">Mobile Bulk Invite</a>-->

                               <!-- <a class="nav-item tab_css nav-link" id="nav-contact3-tab" data-toggle="tab" href="#nav-contact3" role="tab" aria-controls="nav-about" aria-selected="false">Send A Message </a>-->
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex no-block">
                                            <h4 class="card-title mt-2 ml-3">Total Caregiver  {{$totalcaregivers}}</h4>
                                            <div class="ml-auto">
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">

                                                        <div class="col-md-12">
                                                            <input type="text" placeholder="Find people by name" class="form-control myInput">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                   <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link tab_css active" id="nav-All_Caregiver-tab" data-toggle="tab" href="#nav-All_Caregiver" role="tab" aria-controls="nav-All_Caregiver" aria-selected="false">All Caregiver</a>
                  <a class="nav-item nav-link tab_css" id="nav-Approved-tab" data-toggle="tab" href="#nav-Approved" role="tab" aria-controls="nav-Approved" aria-selected="false">Approved Caregiver</a>
                      <a class="nav-item nav-link tab_css" id="nav-unaproved-tab" data-toggle="tab" href="#nav-unaproved" role="tab" aria-controls="nav-unaproved" aria-selected="false">Un Approved Caregiver</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
<!-- All All_Caregiver -->
              <div class="tab-pane fade show active" id="nav-All_Caregiver" role="tabpanel" aria-labelledby="nav-All_Caregiver-tab">
                  
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover earning-box">
                                            <thead class="bg-light">
                                              <tr class="tblhd1">
                                                <th></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <!-- <th>Client</th>
                                                <th>IntakeCo</th> -->
                                                <th>Clasifications</th>
                                                <th>PayRoll</th>
                                                <th colspan="2">Details</th>                                   
                                               <!-- <th>Ratings</th>-->

                                            </tr>
                                        </thead>
                                        <tbody id="myTable" class="tblbd1">                                   
                                           @foreach($all as $row) 
                                           <tr> 
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
                                                <!-- <td> </td>
                                                <td> </td> -->
                                                <td>{{$row->classification}}</td>
                                                <td>$ {{$row->caregiver_payroll}} USD</td>
                                                <td>
                                                   <a href="{{url('caregiverprofiledetails/'.$row->id)}}" class="" title="">  <img src="public/images/view.png" alt="view" class="img-circle" style="height: 20px"></a>
                                                        <a href="{{url('caregiver/'.$row->id.'/delete')}}" class="" onclick="return confirm('Are you sure you want to delete this Caregiver?')"  title=""> <img src="public/images/remove.jpg" alt="view" class="img-circle"  style="height: 20px"></a>
                                               </td>
                                              <!-- <td>
                                                <div class="rating">
                                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                </div>
                                            </td>-->


                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                      </div>
<!-- Approved Care Giver -->
                <div class="tab-pane fade show fade" id="nav-Approved" role="tabpanel" aria-labelledby="nav-Approved-tab">

                         <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover earning-box">
                                            <thead class="bg-light">
                                              <tr class="tblhd1">
                                                <th></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                
                                                <th>Clasifications</th>
                                                <th>PayRoll</th>
                                                <th>Details</th>                                        
                                               <!-- <th>Ratings</th>-->

                                            </tr>
                                        </thead>
                                        <tbody id="myTable" class="tblbd1">                                   
                                           @foreach($approved as $row) 
                                           <tr> 
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
                                                
                                                <td>{{$row->classification}}</td>
                                                <td>$ {{$row->caregiver_payroll}} USD</td>
                                                <td>
                                                   <a href="{{url('caregiverprofiledetails/'.$row->id)}}" class="" title="">  <img src="public/images/view.png" alt="view" class="img-circle" style="height: 20px"></a>
                                               </td>
                                               <!--<td>
                                                <div class="rating">
                                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                </div>
                                            </td>-->


                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
</div>
<!-- Unapproved Caregiver -->
      
                <div class="tab-pane fade show fade" id="nav-unaproved" role="tabpanel" aria-labelledby="nav-unaproved-tab">

       <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover earning-box">
                                            <thead class="bg-light">
                                              <tr class="tblhd1">
                                                <th></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                              
                                                <th>Clasifications</th>
                                                <th>PayRoll</th>
                                                <th>Approve</th>                                        
                                                <th>Remove</th>

                                            </tr>
                                        </thead>
                                        <tbody id="myTable" class="tblbd1">                                   
                                           @foreach($unapproved as $row) 
                                           <tr> 
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
                                                
                                                <td>{{$row->classification}}</td>
                                                <td>$ {{$row->caregiver_payroll}} USD</td>
                                               
                                <td>
                                  <a href="{{url('caregiverprofileapprove/'.$row->id)}}" class="" title=""> <img src="public/images/approve.png" alt="approve" class="img-circle" style="height: 20px"></a> 
                                </td>
                                <td>
                                  <a href="{{url('unapproved/'.$row->id)}}" class="" title=""> <img src="public/images/remove.jpg" alt="remove" class="img-circle" style="height: 20px"></a> 
                                </td>


                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
</div>

                    </div>
                </div>

              </div>

                <div class="tab-pane fade show fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="card card-outline-info">
                        <div class="card-header clrcss1 text-white">
                            <h4 class="m-b-0 text-white">Add Caregiver</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('addcaregiver') }}" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <textarea type="text" name="latitude" id="demo" style="display: none;" >  </textarea>
                                <textarea type="text" name="longitude" id="demo2" style="display: none;" ></textarea>

                                <div class="form-body">
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right lbl2 col-md-3"> Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="name"  placeholder="Enter Name" required>
                                                    <small class="form-control-feedback"> </small> </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right lbl2 col-md-3">Email</label>
                                                    <div class="col-md-9">
                                                        <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                                                        <small class="form-control-feedback"></small> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right lbl2 col-md-3">Gender</label>
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
                                                            <label class="control-label text-right lbl2 col-md-3">Phone</label>
                                                            <div class="col-md-9">
                                                                <input type="number" class="form-control" +++++placeholder="Enter Phone" name="phone" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>

                                                <div class="row">
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right lbl2 col-md-3">Password</label>
                                                            <div class="col-md-9">
                                                                <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/row-->
                                                <div class="row">

                                                   <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right  lbl2 col-md-3">Status</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control custom-select" name="status">
                                                                <option value="1">Active</option>
                                                                <option value="0">Deactivate</option>
                                                            </select>
                                                            <small class="form-control-feedback"></small> </div>
                                                        </div>
                                                    </div>


                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right lbl2 col-md-3">Profile Image</label>
                                                            <div class="col-md-9">
                                                                <input type="file" class="form-control"  name="image" required>                   
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right lbl2 col-md-3">Payroll</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"  name="caregiver_payroll" required>                   
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right lbl2 col-md-3">Clasification</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" name="classification" placeholder="Enter Classification">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group row">
                                                <label class="control-label text-right lbl2 col-md-3">Address</label>
                                                <div class="col-md-9">


                                                <input type="text" id="pac-input" class="form-control iptx" name="address" placeholder="Enter Address">
                                                <div id="map" class="" style="height:150px;"></div>

                                                </div>
                                                </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right  lbl2 col-md-3">IntakeCoordinator</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control custom-select" name="intakeco_id">
                                                                @foreach($activeintakeco as $row)
                                                                <option value="{{$row->id}}">{{$row->intake_name}}</option>
                                                                 @endforeach
                                                            </select>
                                                            <small class="form-control-feedback"></small> </div>
                                                        </div>
                                                    </div>
                                            </div>  
                                        </div>
                                        <div class="">
                                          <hr>
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
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                        <div class="card">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover earning-box">
                                        <thead class="bg-light">
                              <tr class="tblhd1">
                                                <th></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                
                                                <th>Classifications</th>
                                                <th>Payroll</th>

 

                                            </tr>
                                        </thead>
                            <tbody class="tblbd1">                                   
                                            <tr>
                                              @foreach($all as $row)  
                                              <td><span>
                                                @if($row->image)
                                                <img src="{{url('public/clients/'.$row->image)}}" alt="user" width="50">
                                                @else
                                                <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px">
                                                @endif
                                            </span></td>
                                            <td>
                                                <h6>{{$row->name}}</h6><small class="text-muted">                                                {{$row->location}}
                                                </small></td>
                                                <td><span class="label label-warning">{{$row->email}}</span></td>
                                                <td>{{$row->phone}}</td>
                                                
                                                <td>{{$row->classification}}</td>
                                                <td>$ {{$row->caregiver_payroll}} USD</td>


                                                
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
 <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
   <!-- <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Check Background</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Reference</th>
                    <th>Number</th>
                    <th>date</th>
                    <th>Invite</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th>Name</th>
                    <th>Position</th>
                    <th>Reference</th>
                    <th>Number</th>
                    <th>date</th>
                    <th>Invite</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                  <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                  <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                  <tr>
                    <td>Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                  <tr>
                    <td>Airi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                  <tr>
                    <td>Brielle Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2012/12/02</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
  
                  <tr>
                    <td>Jena Gaines</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>30</td>
                    <td>2008/12/19</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                 
        
                  <tr>
                    <td>Donna Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>-->

                    </div>
<!-- Mobile Bulk Invitation -->

                    <div class="tab-pane fade" id="nav-contact2" role="tabpanel" aria-labelledby="nav-contact-tab">
        <!--             <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Bulk Invitation</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Reference</th>
                    <th>Number</th>
                    <th>date</th>
                    <th>Invite</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th>Name</th>
                    <th>Position</th>
                    <th>Reference</th>
                    <th>Number</th>
                    <th>date</th>
                    <th>Invite</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                  <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                  <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                  <tr>
                    <td>Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                  <tr>
                    <td>Airi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                  <tr>
                    <td>Brielle Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2012/12/02</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
  
                  <tr>
                    <td>Jena Gaines</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>30</td>
                    <td>2008/12/19</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                 
        
                  <tr>
                    <td>Donna Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                    <td><button type="submit" class="btn regbtn2">Invite</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>-->
                    </div>
                    <div class="tab-pane fade" id="nav-contact3" role="tabpanel" aria-labelledby="nav-contact-tab">

                        <div class="row mt-5">

                            <div class="card p-20 center1">
                                @if(session('message'))
                                <p class="alert alert-dark">
                                {{session('message')}}</p>
                                @endif

                                <div class="card-body center1  p-5">
                                    <h3 class="text-center"><b>Send Message</b></h3>
                                    <form action="" method="Post" class="form-horizontal">
                                        @csrf


                                        <label class="control-label text-right term1">Select Caregiver</label>
                                        <div class="row mt-4">
                                            <select class="form-control custom-select" name="intakeco_id">

                                                <option value=""><td>Usman</td></option>


                                            </select>
                                        </div>

                                <!-- <div class="row mt-3">
                                <input type="file" name="username" placeholder="Upload Document" class="iptx">
                            </div> -->

                            <div class="row mt-3">
                                <textarea style="border: 2px solid #f4f4f4;" placeholder="Message" name="message" class="iptx" rows="5" cols="40"></textarea>
                            </div>
                            <div class="mt-3 row">
                                <button type="submit" class="regbtn1 form-control center1">SEND</button>
                            </div>

                        </form>
                    </div>

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
<!-- ============================================================== -->
@section('javascript')

<script>
  $(document).ready(function(){
    $(".myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
  "use strict";

      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      function initAutocomplete() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: {
            lat: -33.8688,
            lng: 151.2195
          },
          zoom: 13,
          mapTypeId: "roadmap"
        }); // Create the search box and link it to the UI element.

        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input); // Bias the SearchBox results towards current map's viewport.

        map.addListener("bounds_changed", () => {
          searchBox.setBounds(map.getBounds());
        });
        let markers = []; // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.

        searchBox.addListener("places_changed", () => {
          const places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          } // Clear out the old markers.

          markers.forEach(marker => {
            marker.setMap(null);
          });
          markers = []; // For each place, get the icon, name and location.

          const bounds = new google.maps.LatLngBounds();
          places.forEach(place => {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }

            const icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            }; // Create a marker for each place.

            markers.push(
              new google.maps.Marker({
                map,
                icon,
                title: place.name,
                position: place.geometry.location
              })
              );

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }
    </script>


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

console.log(map);

      }
</script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

     <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAE_q9Li7SkODzq91kpqc4EfHTTdw6b0qg&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>

@endsection
