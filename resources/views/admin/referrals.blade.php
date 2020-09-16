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
           <h6 class="section-title h2 pt-5">Referral Clients</h6>
           <div class="row">
            <div class="col-lg-12">
              
              <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
               <div class="tab-pane fade show active" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex no-block">
                        <h4 class="card-title fgbtn3">Recent Unapproved Referrals:  <?php   
                        $referrals= Session::get('referrals');
                        echo $referrals;
                                   ?></h4>
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
                       
                  <a class="nav-item nav-link tab_css" id="nav-Approved-tab" data-toggle="tab" href="#nav-Approved" role="tab" aria-controls="nav-Approved" aria-selected="false">Approved Clients</a>
                      <a class="nav-item nav-link tab_css" id="nav-unaproved-tab" data-toggle="tab" href="#nav-unaproved" role="tab" aria-controls="nav-unaproved" aria-selected="false">Unapproved Clients</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
<!-- All Clients -->
               <!-- Approved Clients -->
                    <div class="tab-pane show active" id="nav-Approved" role="tabpanel" aria-labelledby="nav-Approved-tab">
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
                                <th>Referred By </th>
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
                                <td>{{$row->intake_name}}</td>

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
                                
                               
                                <th>Classifications</th>
                                 <th >Referred  by</th>
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
                      <a id="nav-System-tab" data-toggle="tab" href="#nav-System" role="tab" aria-controls="nav-System" aria-selected="false" class="col-md-4">
                      <input type="radio" name="questionanswer" value="question">
                      <label class="label-control lbl2" for="question">System Clients</label>
                    </a>   
                    <a id="nav-CRM-tab" data-toggle="tab" href="#nav-CRM" role="tab" aria-controls="nav-CRM" aria-selected="false" class="col-md-4">
                      <input type="radio" name="questionanswer" value="question">
                      <label class="label-control lbl2" for="question">CRM Clients</label>
                    </a>
                    </div>
                  </nav>
                  
           
            
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
