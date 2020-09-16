@extends('layouts.admin_header')

@section('content')
<style type="text/css">
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }

      #target {
        width: 345px;
      }
    </style>

    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <div class="container-fluid">

        <section id="tabs">
          <div class="container">
           @if(session('message'))
           <p class="alert alert-danger" style="background-color=pink !important;">
           {{session('message')}}</p>
           @endif
           <h6 class="section-title h2 pt-5">Clients</h6>
           <div class="row">
            <div class="col-lg-12">
              <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link tab_css active" id="nav-detail-tab" data-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false" style="">All Clients</a>
                  <a class="nav-item nav-link tab_css" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Add Clients</a>
                  <a class="nav-item nav-link tab_css" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Newly Added</a>

                  <a class="nav-item nav-link tab_css" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Deactivate</a>
                </div>
              </nav>
              <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex no-block">
                        <h4 class="card-title fgbtn3">Total Clients  {{$totalclients}}</h4>
                        <div class="ml-auto">
                         <div class="row">
                          <!--/span-->
                          <div class="col-md-12">
                            <div class="form-group row">
                              <div class="col-md-12">
                                <input type="text" id="myInput" placeholder="Find people by name" class="form-control">
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
                      <a class="nav-item nav-link tab_css active" id="nav-All_Clients-tab" data-toggle="tab" href="#nav-All_Clients" role="tab" aria-controls="nav-All_Clients" aria-selected="false">All Clients</a>
                  <a class="nav-item nav-link tab_css" id="nav-Approved-tab" data-toggle="tab" href="#nav-Approved" role="tab" aria-controls="nav-Approved" aria-selected="false">Approved Clients</a>
                      <a class="nav-item nav-link tab_css" id="nav-unaproved-tab" data-toggle="tab" href="#nav-unaproved" role="tab" aria-controls="nav-unaproved" aria-selected="false">Un Approved Clients</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
<!-- All Clients -->
              <div class="tab-pane fade show active" id="nav-All_Clients" role="tabpanel" aria-labelledby="nav-All_Clients-tab">
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
                                <th>Hourly Rate</th>
                                <th>Last Visit</th>
                                <th>Type</th>  
                                <th colspan="2">Details</th>


                              </tr>
                            </thead>
                            <tbody id="myTable" class="tblbd1">                                   
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
                                  <h6>{{$row->client_name}}</h6><small class="text-muted">{{$row->address}}</small></td>
                                  <td><span class="label label-warning">{{$row->email}}</span></td>
                                  <td>{{$row->phone}}</td>
                                 
                                  <td>{{$row->classification}}</td>
                                  <td>${{$row->payroll}} USD</td>

                                  <td>

                                  </td>
                                  <td>{{$row->type}}</td>
                                  <td>
                                    <a href="{{url('clientprofiledetails/'.$row->id)}}" class="" title=""> <img src="public/images/view.png" alt="view" class="img-circle" style="height: 20px"></a> &nbsp;
                                    <a href="{{url('client/'.$row->id.'/delete')}}" class="" onclick="return confirm('Are you sure you want to delete this client?')" title=""> <img src="public/images/remove.jpg" alt="view" class="img-circle" style="height: 20px"></a>
                                  </td>


                                </tr>
                                @endforeach

                              </tbody>
                            </table>
                          </div>
                        </div>

</div>
                    <!-- Approved Clients -->
                    <div class="tab-pane show fade" id="nav-Approved" role="tabpanel" aria-labelledby="nav-Approved-tab">
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
                                <th>Hourly Rate</th>
                                <th>Last Visit</th>
                                <th>Details</th>


                              </tr>
                            </thead>
                            <tbody id="myTable" class="tblbd1">                                   
                              <tr>
                                @foreach($approveclients as $row)  
                                <td><span>
                                  @if($row->image)
                                  <img src="{{url('public/clients/'.$row->image)}}" alt="user" width="50">
                                  @else
                                  <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px">
                                  @endif
                                </span></td>
                                <td>
                                  <h6>{{$row->client_name}}</h6><small class="text-muted">{{$row->address}}</small></td>
                                  <td><span class="label label-warning">{{$row->email}}</span></td>
                                  <td>{{$row->phone}}</td>
                                  
                                  <td>{{$row->classification}}</td>
                                  <td>${{$row->payroll}} USD</td>

                                  <td>
                                  </td>
                                  <td>
                                    <a href="{{url('clientprofiledetails/'.$row->id)}}" class="" title=""> <img src="public/images/view.png" alt="view" class="img-circle" style="height: 20px"></a>
                                  </td>


                                </tr>
                                @endforeach

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <!-- un approved clients -->
                      <div class="tab-pane fade" id="nav-unaproved" role="tabpanel" aria-labelledby="nav-unaproved-tab">
                       <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover earning-box">
                            <thead class="bg-light">
                              <tr class="tblhd1">
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                
                                <th >Refered by</th>
                                <th>Classifications</th>
                                <th>Hourly Rate</th>
                                <th>Approve</th>
                                <th>Remove</th>


                              </tr>
                            </thead>
                            <tbody id="myTable" class="tblbd1">                                   
                              <tr>
                                @foreach($unapprovedclients as $row)  
                                <td><span>
                                  @if($row->image)
                                  <img src="{{url('public/clients/'.$row->image)}}" alt="user" width="50">
                                  @else
                                  <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px">
                                  @endif
                                </span>
                              </td>
                              <td>
                                <h6>{{$row->client_name}}</h6><small class="text-muted">{{$row->address}}</small></td>
                                <td><span class="label label-warning">{{$row->email}}</span></td>
                                <td>{{$row->phone}}</td>
                                
                                <td>{{$row->intake_name}}</td>
                                <td>{{$row->classification}}</td>
                                <td>${{$row->payroll}} USD</td>

                                <td>
                                  <a href="{{url('clientprofileapprove/'.$row->id)}}" class="" title=""> <img src="public/images/approve.png" alt="approve" class="img-circle" style="height: 20px"></a> 
                                </td>
                                <td>
                                  <a href="{{url('removeprofile/'.$row->id)}}" class="" title="" OnClick="return confirm('Are you sure to remove this client?');"> <img src="public/images/remove.jpg" alt="remove" class="img-circle" style="height: 20px"></a> 
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
<!-- Add New Clients -->
              <div class="tab-pane fade show fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                               <div class="card card-outline-info"> 
  
    <div class="card-header clrcss1 text-white">

                    <h4 class="m-b-0 text-white">Add Client</h4>
        </div>      
               <nav>
           <div class="nav nav-tabs nav-fill mt-3" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link tab_css col-md-6 active" id="nav-System-tab" data-toggle="tab" href="#nav-System" role="tab" aria-controls="nav-System" aria-selected="false" style="">System Clients</a>
                       <a class="nav-item nav-link tab_css col-md-6" id="nav-CRM-tab" data-toggle="tab" href="#nav-CRM" role="tab" aria-controls="nav-CRM" aria-selected="true">CRM Clients</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <!-- System Clients -->
                    <div class="tab-pane show active" id="nav-System" role="tabpanel" aria-labelledby="nav-System-tab">
                  <div class="card-body">
                    <form method="POST" action="{{ route('addclient') }}" class="form-horizontal" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <textarea type="text" name="latitude" id="demo" style="display: none;">  </textarea>
                      <textarea type="text" name="longitude" id="demo2" style="display: none;"></textarea>
                      <input type="hidden" class="form-control" name="type" value="system" required>

                      <div class="form-body">
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="control-label text-right lbl2 col-md-3">Name</label>
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
                              <!--/row-->
                              <div class="row">

                               <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="control-label text-right lbl2 col-md-3">Status</label>
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
                                  <label class="control-label text-right lbl2 col-md-3">Classifications</label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control" name="classification" placeholder="Enter Classification">
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="control-label text-right lbl2 col-md-3">Hourly Rate</label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control" name="payroll" placeholder="Enter Rate perhour">

                                  </div>
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
                              <label class="control-label text-right lbl2 col-md-3">Tasks</label>
                              <div class="col-md-9">

                                <div class="input-group">
                                <input type="text" id="taskinput" class="form-control iptx" name="client_task" placeholder="Referral Call" >
                                </div>
                                <span class="label label-danger fontfamily">Add Comma to separate tasks in the task list</span>
                            </div>
                        </div>
                    </div>
      
                        </div>                                    
                        <div class="" >
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
                
<!-- CRM CLients -->
              <div class="tab-pane fade show fade" id="nav-CRM" role="tabpanel" aria-labelledby="nav-CRM-tab">
                 
                  <div class="card-body">
                    <form method="POST" action="{{ route('addclient') }}" class="form-horizontal" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <textarea type="text" name="latitude" id="demo" style="display: none;">  </textarea>
                      <textarea type="text" name="longitude" id="demo2" style="display: none;"></textarea>
                      <input type="hidden" class="form-control" name="type" value="crm"  >

                      <div class="form-body">
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="control-label text-right lbl2 col-md-3">Name</label>
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
                              <!--/row-->
                            

                              <div class="row">


                               <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="control-label text-right lbl2 col-md-3">Classifications</label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control" name="classification" placeholder="Enter Classification">
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="control-label text-right lbl2 col-md-3">Hourly Rate</label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control" name="payroll" placeholder="Enter Rate perhour">

                                  </div>
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
                              <label class="control-label text-right lbl2 col-md-3">Tasks</label>
                              <div class="col-md-9">

                                <div class="input-group">
                                <input type="text" id="taskinputway" class="form-control iptx" name="client_task" placeholder="Referral Call" >
                                </div>
                                <span class="label label-danger fontfamily">Add Comma to separate tasks in the task list</span>
                            </div>
                        </div>
                    </div>
      
                        </div>                                    
                        <div class="" >
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
</div>
</div>


                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                  <div class="card">

                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover earning-box">
                          <thead class="bg-light">
                              <tr class="tblhd1">
                              <th colspan="2">Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Caregiver</th>
                              <th>IntakeCo</th>
                              <th>Classifications</th>
                              <th>Hourly Rate</th>
                              <th>Last Visit</th>
                              <th>Details</th>


                            </tr>
                          </thead>
                            <tbody class="tblbd1">                                   
                            <tr>
                              @foreach($newlyadded as $row)  
                              <td><span>
                                @if($row->image)
                                <img src="{{url('public/clients/'.$row->image)}}" alt="user" width="50">
                                @else
                                <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px">
                                @endif
                              </span></span></td>
                              <td>
                                <h6>{{$row->client_name}}</h6><small class="text-muted">{{$row->address}}</small></td>
                                <td><span class="label label-warning">{{$row->email}}</span></td>
                                <td>{{$row->phone}}</td>
                                <td></td>
                                <td></td>
                                <td>{{$row->classification}}</td>
                                <td>${{$row->payroll}} USD</td>

                                <td>{{$row->created_at}}</td>
                                <td>
                                 <a href="{{url('clientprofiledetails/'.$row->id)}}" class="" title=""> <img src="public/images/view.png" alt="view" class="img-circle" style="height: 50px"> </i></a>
                               </td>

                             </tr>
                             @endforeach

                           </tbody>
                         </table>
                       </div>
                     </div>
                   </div>

                 </div>

                 <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">

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
                            <th>Hourly Rate</th>
                            <th>Last Visit</th>
                            <th>Details</th>


                          </tr>
                        </thead>
                            <tbody class="tblbd1">                                   
                          <tr>
                            @foreach($deactivate as $row)  
                            <td><span>
                              @if($row->image)
                              <img src="{{url('public/clients/'.$row->image)}}" alt="user" width="50">
                              @else
                              <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px">
                              @endif
                            </span></td>
                            <td>
                              <h6>{{$row->client_name}}</h6><small class="text-muted">{{$row->address}}</small></td>
                              <td><span class="label label-warning">{{$row->email}}</span></td>
                              <td>{{$row->phone}}</td>
                              
                              <td>{{$row->classification}}</td>

                              <td>${{$row->payroll}} USD</td>

                              <td>{{$row->created_at}}</td>

                              <td>
                               <a href="{{url('clientprofiledetails/'.$row->id)}}" class="" title=""> <img src="public/images/view.png" alt="view" class="img-circle" style="height: 50px"> </i></a>
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
    $("#myInput").on("keyup", function() {
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


      }
    </script>

    <script type="text/javascript">

jQuery( document ).ready(function() {

jQuery('#taskinput').tags();

});


</script>   
 <script type="text/javascript">

jQuery( document ).ready(function() {

jQuery('#taskinputway').tags();

});


</script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
     <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2I-HH3VOzFm6zp5UNctq1gdDJTu4bUtc&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>




    @endsection
