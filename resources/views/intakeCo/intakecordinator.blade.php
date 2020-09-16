@extends('layouts.admin_header')
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
         @if(session('message'))
           <p class="alert alert-danger" style="background-color=pink !important;">
           {{session('message')}}</p>
           @endif
        <section id="tabs">
            <div class="container">
                <h6 class="section-title h2 pt-5">Intake Coordinator</h6>
                <div class="row">
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link tab_css active" id="nav-detail-tab" data-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">All Intake Coordinator</a>

                                <a class="nav-item nav-link tab_css" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Add Intake Coordinator</a>


                               <!-- <a class="nav-item nav-link tab_css" id="nav-contact3-tab" data-toggle="tab" href="#nav-contact3" role="tab" aria-controls="nav-about" aria-selected="false">Send A Message </a>  -->

                                <a class="nav-item nav-link tab_css" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Deactivate</a>


                            </div>
                        </nav>
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <h4 class="card-title fgbtn3">Total Intake Coordinator  {{$totalintakecordinator}}</h4>
                    <div class="ml-auto">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input type="text"  placeholder="Find people by name" class="form-control myInput">
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>  
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover earning-box">
                    <thead class="bg-light">
                      <tr class="tblhd1">
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <!--<th>Caregiver</th>
                        <th>Client</th> -->
                        <th>Classification</th>
                        <th>Payroll</th>
                        <th colspan="2">Details</th>


                    </tr>
                </thead>
                <tbody id="myTable" class="tblbd1">                                   
                   @foreach($activeintakeco as $row) 
                   <tr> 
                    <td><span>
                        @if($row->image)
                        <img src="{{url('public/clients/'.$row->image)}}" alt="user" width="50">
                        @else
                        <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px">
                        @endif
                    </span></td>
                    <td>
                        <h6>{{$row->intake_name}}</h6><small class="text-muted">
                            {{$row->location}}
                        </small></td>
                        <td><span class="label label-warning">{{$row->email}}</span></td>
                        <td>{{$row->phone}}</td>
<!--                       <td></td>
                       <td></td>-->
                        <td>{{$row->classification}}</td>
                        <td>${{$row->intakeco_payroll }} USD</td>

                        <td>
                           <a href="{{url('intakecoprofiledetails/'.$row->id)}}" class="" title="">  <img src="public/images/view.png" alt="view" class="img-circle" style="height: 20px"></a>   
                           
                           <a href="{{url('intakeCordinator/'.$row->id.'/delete')}}" class="" onclick="return confirm('Are you sure you want to delete this Intake Coordinator?')"  title="">  <img src="public/images/remove.jpg" alt="view" class="img-circle" style="height: 20px"></a>
                       </td>

                   </tr>
                   @endforeach

               </tbody>
           </table>
       </div>
   </div>
</div>
</div>

<div class="tab-pane fade show fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
<div class="card card-outline-info">
<div class="card-header clrcss1 text-white">
<h4 class="m-b-0 text-white">Add Intake Coordinator</h4>
</div>
<div class="card-body">
<form method="POST" action="{{ route('addintakeCordinator') }}" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    <textarea type="text" name="latitude" id="demo" style="display: none;"></textarea>
    <textarea type="text" name="longitude" id="demo2" style="display: none;"></textarea>

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
                    <div class="form-group  row">
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
                        <div class="form-group  row">
                            <label class="control-label text-right lbl2 col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                                <small class="form-control-feedback"></small> </div>
                            </div>
                        </div>


                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right lbl2 col-md-3">Phone</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" placeholder="Enter Phone" name="phone" required>
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

                       <!--  <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right lbl2 col-md-3"> Caregiver </label>
                                <div class="col-md-9">
                                    <select class="form-control custom-select" name="caregiver_id">
                                       @foreach($activecaregivers as $spc)

                                       <option value="{{$spc->id}}"><td>{{$spc->name}}</td></option>
                                       @endforeach


                                   </select>
                                   <small class="form-control-feedback"></small> 
                               </div>
                           </div>
                       </div> -->



                       <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right lbl2 col-md-3">Classification</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="classification" placeholder="Enter Classification">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right lbl2 col-md-3">Payroll</label>
                            <div class="col-md-9">
                               <input type="text" class="form-control" name="intakeco_payroll" placeholder="Enter Payroll">


                           </div>
                       </div>
                   </div>

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
            </div>                            
        </div>
        <div class="" >
          <hr>
      </div>
          <div class="row">
            <div class="ml-5">
                <button type="submit" class="btn regbtn2">Submit</button>
            </div>&nbsp;&nbsp;
            <div>
                <button type="button" class="btn cancelbtn">Cancel</button>
            </div>
        </div>
    </form>
    </div>
</div>
</div>
                <!-- Tab Profile -->

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
                                        <th>Caregiver</th>
                                        <th>Client</th>
                                        <th>Last Visit</th>
                                        <th>Classifications</th>
                                        <th>Payroll</th>
                                        <th>Details</th>









                                    </tr>
                                </thead>
                               <tbody id="myTable" class="tblbd1">                                   
                                   @foreach($deactivated as $row) 
                                   <tr> 
                                    <td><span>
                                        @if($row->image)
                                        <img src="{{url('public/clients/'.$row->image)}}" alt="user" width="50">
                                        @else
                                        <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px">
                                        @endif
                                    </span></td>
                                    <td>
                                        <h6>{{$row->intake_name}}</h6><small class="text-muted">
                                            {{$row->location}}
                                        </small></td>
                                        <td><span class="label label-warning">{{$row->email}}</span></td>
                                        <td>{{$row->phone}}</td>
                                        <td></td>
                                        <td></td>

                                        <td> </td>

                                        <td>{{$row->classification}}</td>

                                        <td>${{$row->intakeco_payroll}} USD</td>


                                        <td>
                                        <a href="{{url('intakecoprofiledetails/'.$row->id)}}" class="" title="">  <img src="public/images/view.png" alt="view" class="img-circle" style="height: 20px"></a>
                                        </td>
           <!--  <td>      
             <a href="{{url('intakecoprofiledetails/'.$row->id)}}" class="" title=""> View Details </i></a>
         </td> -->

     </tr>
     @endforeach

 </tbody>
</table>
</div>
</div>
</div>

</div>

<!-- Contact Tab -->

<div class="tab-pane fade" id="nav-contact3" role="tabpanel" aria-labelledby="nav-contact-tab">

    <div class="row mt-5">

        <div class="card p-20 center1">
            @if(session('message'))
            <p class="alert alert-dark">
            {{session('message')}}</p>
            @endif

            <div class="card-body center1  p-5">
                <h4 class="text-center fgbtn3"><b>Send Message</b></h4>
                <form action="{{ route('sendmessage')}}" method="Post" class="form-horizontal">
                    @csrf


                    <label class="control-label term1">Select Intake Coordinator</label>
                    <div class="row mt-3">
                        <select class="form-control custom-select" name="intakeco_id">
                            @foreach($activeintakeco as $spc)
                            <option value="{{$spc->id}}"><td>{{$spc->intake_name}}</td></option>
                            @endforeach


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


      }
    </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
   <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA32r6HRi2h4lcvfs6qkGGUuG8MsAWlpqk&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>


@endsection
