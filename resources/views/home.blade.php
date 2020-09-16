@include('layouts.admin_header')
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row nav771">
         <div class="col-lg-3 col-md-12 col-sm-12"></div>
         <div class="col-lg-6 col-md-12 col-sm-12">
             <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                 <a class="nav-item nav-link active tab_css" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Activity</a>
                 <a class="nav-item nav-link tab_css" id="nav-Calendar-tab" data-toggle="tab" href="#nav-Calendar" role="tab" aria-controls="nav-Calendar" aria-selected="false">Shift Calendar</a>
                 <a class="nav-item nav-link tab_css" id="nav-Care-tab" data-toggle="tab" href="#nav-Care" role="tab" aria-controls="nav-Care" aria-selected="false">Daily Care Logs</a>
             </div>
         </nav>   
     </div> 
 </div>  
 <!-- Row -->

 <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

        <div class="row mt-5">
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9">
                <div class="card">

                    <div class="bg-light p-20">
                        <div class="d-flex">
                            <div class="align-self-center">
                                <h3 class="m-b-0 hd12">Filter by</h3>
                            </div>
                        </div>
                        <div class="">
                            <input type="search" class="iptx form-control myInput"  placeholder="Missed checked in" name="search">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover earning-box" >

                                <tbody  id="myTable">
                                    @foreach($missedcheckin as $row)
                                   <tr>
                                    @if($row->image)
                                    <td><span class="round"><img src="{{url('public/clients/'.$row->image)}}" alt="user" width="45" height="44"></span><br><br></td>
                                     @else
                                    <td><span class="round"><img src="public/images/person.png" alt="user" width="45" height="45"></span><br><br></td>

                                     @endif
                                     <td>
                                        <h6>{{$row->name}}</h6><small class="text-muted"> caregiver missed schedule</small></td>
                                        <td><small class="text-muted">{{$row->date}} <br><br><br><br></small></td>
                                    </tr>
                                    @endforeach
                                     
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column -->
                        <div class="col-lg-4 col-xlg-3">
                            <div class="card card-inverse card-white">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="m-r-20 align-self-center">
                                            <h1 class="text-gray-dark"><i class="ti-light-bulb"></i></h1></div>
                                            <div>
                                                <h3 class="lbl2" >Recent activity</h3>
                                                
                                                <a href="{{url('recentactivity')}}">
                                                <h6 class="sm12"><!-- <i class="mdi mdi-bell" style="color: #red !important;"></i>  -->
                                                 New reference {{$newreff}} </h6></a>
                                                @foreach($notification as $row) 
                                                <a href="{{url('recentactivity')}}"><h6 class="sm12">New Client {{$row->client_name}} added by {{$row->intake_name}}</h6></a>
                                            </div>
                                            @endforeach

                                        </div>
                                        <div class="row mt-5 ml-2">
                                           <!--  <h6 class="font-light text-gray-dark"><a href="{{url('notifications')}}">view all</a></h6> -->                                
                                       </div>
                                   </div>
                               </div>
                               <div class="card card-inverse card-white">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="m-r-20 align-self-center">
                                            <h1 class=""><i class="ti-pie-chart"></i></h1></div>
                                            <div>
                                                <h3 class="lbl2">My Documents</h3>
                                           <div class="row">
                                              
                                                @foreach($notes as $row)
                                                <a href="{{url('')}}"><h6 class="term1 p-2"><img src="public/images/doc.png" alt="notes" width="50"></h6> 
                                                </a>
                                                @endforeach
                                                
                                            </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

</div>
</div>
<!-- shift calendar tab menu -->
<div class="tab-pane fade" id="nav-Calendar" role="tabpanel" aria-labelledby="nav-Calendar-tab">
  <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
               <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                 <a class="nav-item nav-link tab_css active" id="nav-Client-tab" data-toggle="tab" href="#nav-Client" role="tab" aria-controls="nav-Client" aria-selected="false">Client</a>
                 <a class="nav-item nav-link tab_css" id="nav-caregiver-tab" data-toggle="tab" href="#nav-caregiver" role="tab" aria-controls="nav-caregiver" aria-selected="false">Caregiver</a>
                 <a class="nav-item nav-link tab_css" id="nav-Coordinator-tab" data-toggle="tab" href="#nav-Coordinator" role="tab" aria-controls="nav-Coordinator" aria-selected="false">Intake Co-ordinator</a>
             </div>
         </nav>  
     </div>
     <div class="col-md-2">

     </div>
     <div class="col-md-4">
        <div class="row">

         <div class="col-sm-3">
            <label class="fgbtn3 mt-2 ml-1"> Today</label>
        </div>
        <div class="col-sm-9">
            <input type="date" placeholder="Select date" name="date" class="iptx">        
        </div>
    </div>
</div>
</div>
</div>
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

<!-- Clients -->

<div class="tab-pane fade show active" id="nav-Client" role="tabpanel" aria-labelledby="nav-Client-tab">

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


<!-- Caregiver -->
<div class="tab-pane fade" id="nav-caregiver" role="tabpanel" aria-labelledby="nav-caregiver-tab">
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


<!-- Coordinator -->
<div class="tab-pane fade" id="nav-Coordinator" role="tabpanel" aria-labelledby="nav-Coordinator-tab">
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
</div>
</div>

<!-- daily care log tab menu -->

<div class="tab-pane fade" id="nav-Care" role="tabpanel" aria-labelledby="nav-Care-tab">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="hd12 mt-2"><?php echo  date("l jS \of F Y "); ?>
                    <img src="public/images/notification.jpg" alt="view" class="img-circle" style="height: 20px">
                    </h5>

                </div>
                <div class="col-md-4">
                    <input type="tyext" name="date" id="myInput" placeholder="Search By Date" class="iptx">        

                </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
</div>
</div>                

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
