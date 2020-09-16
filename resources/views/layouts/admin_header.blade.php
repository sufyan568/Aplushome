<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicon.png">
    <title>A + Home</title>
    <link href="public/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/morris.css" rel="stylesheet">
    <link href="public/css/tags.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="public/icons/materialdesignicons.css" id="theme" rel="stylesheet">
    <link href="public/icons/material-design-iconic-font/css/materialdesignicons.min.css" id="theme" rel="stylesheet">

     <link href="{{ asset('public/css/bootstrap/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
     <link href="{{ asset('public/css/morris.css') }}" rel='stylesheet' type='text/css' />
     <link href="{{ asset('public/css/style.css') }}" rel='stylesheet' type='text/css' />
    <!--  <link href="{{ asset('icons/materialdesignicons.css') }}" rel='stylesheet' type='text/css' />  
     <link href="{{ asset('icons/icons/material-design-iconic-font/css/materialdesignicons.min.css') }}" rel='stylesheet' type='text/css' /> -->  
     <link href="{{ asset('public/css/register.css') }}" rel='stylesheet' type='text/css' /> 
      <link rel="stylesheet" href="public//css/register.css" >


</head>

<body class="fix-header fix-sidebar card-no-border">
    <div id="main-wrapper">
        <header class="topbar topbar1" style="background-color: #F3F3F3;">
            <nav class="navbar top-navbar navbar-expand-md navbar-light nav1" style="background-color: white; border: solid 1px #F3F3F3 ;">
                <div class="navbar-header">
                </div>
                 <?php $notifications = Session::get('notification');
                       $referrals= Session::get('referrals');
                      $newcaregivers= Session::get('newcaregivers');

                                ?>
                <div class="navbar-collapse" >
                    <ul class="navbar-nav mr-auto mt-md-0">
                         <li class="nav-item">
                        <input type="Search" placeholder="Search here"  class="iptx srch1" name="">
                      </li>

                        <li class="nav-item dropdown delnot" >
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                             
                                    

                           
                            <img src="{{url('public/images/notification.jpg')}}" alt="view" class="img-circle " style="height: 18px" >  <span id="notifyy" class="badge badge-pill badge-danger"></span>
<p></p>                                             
                            </a>
                        
                            <div class="dropdown-menu mailbox animated slideInUp" >
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                           
                                             @foreach($notifications as $row)
                                            <a href="{{url('single_notification->$row->id')}}">
                                                <div class="btn btn-danger btn-circle" ><i class="mdi mdi-bell" ></i></div>
                                                <div class="mail-contnet">
                                                    <h5>{{$row->title}}</h5>
                                                 <span class="time">{{$row->time}}</span> 
                                             </div>
                                            </a>
                                            @endforeach
                                            
                                        </div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center" href="{{url('markallunread')}}"> <strong>View All</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                   <?php $chatpopup = Session::get('chatpopup');
                                ?>
                      <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{url('public/images/inbox.jpg')}}" alt="view"  style="height: 20px">
                                
                            </a>

                            <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">Recent Chat</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                                                @foreach($chatpopup as $row)
                                            <a href="{{url('conversation/'.$row->intakeco_id)}}">
                                                 @if($row->image)
                                                <div class="user-img"> <img src="{{url('public/clients/'.$row->image)}}" alt="user" class="img-circle" style="width: 50px; height: 50px;"> <span class="profile-status online pull-right"></span> 
                                                </div>
                                                @else
                                                <div class="user-img"> <img src="{{url('public/images/person.png')}}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> 
                                                </div> 
                                                 @endif                                              
                                                <div class="mail-contnet">
                                                    <h5>{{$row->intake_name}}</h5> <span class="mail-desc">{{$row->message}}</span> <span class="time">{{$row->time}}</span> </div>
                                            </a>
                                            @endforeach
                                            
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="{{url('inbox')}}"> <strong>See all</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                            <!-- Messages -->    
                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="{{url('addtask')}}" style="color: #A4A4A4 !important;" >Add task</a>
                            <div class="dropdown-menu animated slideInUp">
                                <ul class="mega-dropdown-menu row">
                                    <li class="col-lg-3 col-xlg-2 m-b-30">
                                        <h4 class="m-b-20">CAROUSEL</h4>
                                        <!-- CAROUSEL -->
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <div class="container"> <img class="d-block img-fluid" src="public/assets/images/big/img1.jpg" alt="First slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="public/assets/images/big/img2.jpg" alt="Second slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="public/assets/images/big/img3.jpg" alt="Third slide"></div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                        </div>
                                        <!-- End CAROUSEL -->
                                    </li>
                                    <li class="col-lg-3 m-b-30">
                                        <h4 class="m-b-20">ACCORDION</h4>
                                        <!-- Accordian -->
                                        <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingOne">
                                                    <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Collapsible Group Item #1
                                                </a>
                                              </h5> </div>
                                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingTwo">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Collapsible Group Item #2
                                                </a>
                                              </h5> </div>
                                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingThree">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  Collapsible Group Item #3
                                                </a>
                                              </h5> </div>
                                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">CONTACT US</h4>
                                        <!-- Contact -->
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </li>
                                    <li class="col-lg-3 col-xlg-4 m-b-30">
                                        <h4 class="m-b-20">List style</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Messages -->                        
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Search -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                        
                        <!-- Language -->
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up"> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
                        </li>
                        
                        <!-- Profile -->
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{url('public/admin/'.Auth::user()->image)}}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{url('public/admin/'.Auth::user()->image)}}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p><a href="{{url('/viewprofile')}}" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{url('addstaff') }}"><i class="ti-user"></i> Add Staff Account</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i>All Account Activity</a></li>
                                    <li><a href="{{url('changepassword') }}"><i class="ti-email"></i>Change Password</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{url('myprofile') }}"><i class="ti-settings"></i>My Account</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i> {{ __('Logout') }}</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <!-- End Topbar header -->
        
        
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        
        <aside class="left-sidebar sidebar754" style="overflow: visible;">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="" style="padding: 10px;width: 100%;"> 
                        <img src="https://www.aplushomecareonline.com/wp-content/themes/ahomecare/images/compname.png" alt="A + Home" class="img-fluid" />
                        <!-- this is blinking heartbit-->
                 <!--        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                 -->
                     </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                       
                        <div class="dropdown-menu animated flipInY">
                            <!-- text-->
                            <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <!-- text-->
                            <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                            <!-- text-->
                            <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            <!-- text-->
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a class="waves-effect waves-dark lbl3" href="{{url('home')}}" aria-expanded="false"><img src="{{ asset('public/icons/image/dashboard.png')}}" alt="" class="sideicon"><span class="hide-menu"> Dashboard </span></a>
                           
                        </li>                     
                        <li> <a class="waves-effect waves-dark lbl3" href="{{url('inbox')}}" aria-expanded="false"><img src="{{ asset('public/icons/image/mail.png')}}" alt="" class="sideicon"><span class="hide-menu"> Inbox</span></a>
                           
                        </li>
                         <li> <a class="waves-effect waves-dark lbl3" href="{{url('client')}}" aria-expanded="false"><img src="{{ asset('public/icons/image/wheelchair.png')}}" alt="" class="sideicon"><span class="hide-menu"> Clients</span></a>
                           
                        </li>
                       
                         <li> <a class="waves-effect waves-dark lbl3" href="{{url('caregiver')}}" aria-expanded="false"><img src="{{ asset('public/icons/image/heart1.png')}}" alt="" class="sideicon"><span class="hide-menu"> Caregivers <span class="badge badge-pill badge-danger">{{$newcaregivers}}</span>
</span></a>
                           
                        </li>
                       
                         <li> <a class="waves-effect waves-dark lbl3" href="{{url('intakeCordinator')}}" aria-expanded="false"><img src="{{ asset('public/icons/image/leaf.png')}}" alt="" class="sideicon"><span class="hide-menu"> Intake Coordinators</span></a>
                           
                        </li>
                       
                         <li> <a class="waves-effect waves-dark lbl3" href="{{url('accounting')}}" aria-expanded="false"><img src="{{ asset('public/icons/image/money.png')}}" alt="" class="sideicon"><span class="hide-menu"> Accounting</span></a>
                           
                        </li>
                       
                         <li> <a class="waves-effect waves-dark lbl3" href="{{url('/referrals')}}" aria-expanded="false"><img src="{{ asset('public/icons/image/bar.png')}}" alt="" class="sideicon"><span class="hide-menu"> Referrals  <span class="badge badge-pill badge-danger">{{$referrals}}</span>  </span></a>
                           
                        </li>
                       
                         <li> <a class="waves-effect waves-dark lbl3" href="{{url('report')}}" aria-expanded="false"><img src="{{ asset('public/icons/image/gear.png')}}" alt="" class="sideicon"><span class="hide-menu"> Reports</span></a>
                           
                        </li>
                       
                         <li> <a class="waves-effect waves-dark lbl3" href="{{route('feedback')}}" aria-expanded="false"><img src="{{ asset('public/icons/image/summer.png')}}" alt="" class="sideicon"><span class="hide-menu"> Feedback</span></a>
                           
                        </li>
                       
                         <li> <a class="waves-effect waves-dark lbl3" href="{{route('faq')}}" aria-expanded="false"><img src="{{ asset('public/icons/image/question.png')}}" alt="" class="sideicon"><span class="hide-menu"> FAQ</span></a>
                           
                        </li>
                            <li> <a class="waves-effect waves-dark lbl3" href="{{route('carequiz')}}" aria-expanded="false"><img src="{{ asset('public/icons/image/question.png')}}" alt="" class="sideicon"><span class="hide-menu"> CareQuiz</span></a>
                           
                        </li>      
                         <li> <a class="waves-effect waves-dark lbl3" href="{{route('weeklysurvey')}}" aria-expanded="false"><img src="{{ asset('public/icons/image/question.png')}}" alt="" class="sideicon"><span class="hide-menu"> Weekly Survey</span></a>
                           
                        </li>
                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        
        @yield('content')

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

$(document).ready(function () {
    var lastId = 0; //Set id to 0 so you will get all records on page load.
    var request = function () {
    $.ajax({
        type: 'get',
        url: "{{ route('getnotificationcount') }}",
        data: { id: lastId }, //Add request data
        dataType: 'json',
        success: function (data) {
        $('#notifyy').html(data);        
        }, error: function () {
        console.log(data);
        }
    });
    };
   setInterval(request, 1000);
});

</script>
<script>

  $(".delnot").click(function(event){

      event.preventDefault();
      $.ajax({
        url:"{{ route('markallunread') }}",
        type:"GET",
        success:function(response){
          if(response) {
          console.log(response);

          }
          else{
           console.log('sorry');
          }
          
        },
       });
  });
</script>
    <script src="public/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="public/assets/plugins/bootstrap/js/popper.min.html"></script>
    <script src="public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="public/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="public/js/sidebarmenu.js"></script>
    <script src="public/js/tags.js"></script>
    <!--stickey kit -->
    <script src="public/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="public/js/custom.min.js"></script>
    
    <!-- This page plugins -->
    
    <!--sparkline JavaScript -->
    <script src="public/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--morris JavaScript -->
    <script src="public/assets/plugins/raphael/raphael-min.js"></script>
    <script src="public/assets/plugins/morrisjs/morris.min.js"></script>
    <!-- Chart JS -->
    <script src="public/js/dashboard1.js"></script>
    
    <!-- Style switcher -->
    
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

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

  @yield('javascript') 

</body>
</html>