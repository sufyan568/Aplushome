@extends('layouts.admin_header')
@section('content')
<div class="page-wrapper">
    <!-- Container fluid  -->  
    <div class="container-fluid">
        <!-- Row -->
        <div class="row mt-3">
     
               <div class="float-right" style="margin-left: 85%;">
                     <button type="button" class=" regbtn2" data-toggle="modal" data-target="#exampleModal">
                        Compose
                    </button>
                </div>
            <div class="row p-20 w-100">
                <div class="col-lg-9 col-xlg-9">
                    <h2 class="fontfamily">Inbox</h2>
                </div>
                <div class="col-lg-3 col-xlg-3 float-right">
                    <input type="search" class="iptx form-control myInput" placeholder="Search Date"  name="search">
                </div>
            </div>
            <div class="col-lg-12 col-xlg-12">
                <div class="card">
                      <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link tab_css active" id="nav-Caregiver-tab" data-toggle="tab" href="#nav-Caregiver" role="tab" aria-controls="nav-Caregiver" aria-selected="false">Intake Coordinator</a>

            <a class="nav-item tab_css nav-link" id="nav-Coordinator-tab" data-toggle="tab" href="#nav-Coordinator" role="tab" aria-controls="nav-Coordinator" aria-selected="false">Caregiver</a>
        </div>
    </nav>   
     <!-- Tab menus -->
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <!--  Caregiver tab menu -->
        <div class="tab-pane fade show active" id="nav-Caregiver" role="tabpanel" aria-labelledby="nav-Caregiver-tab">
      
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover earning-box">
                               <thead class="bg-light">
                                  <tr class="tblhd1">
                                    <th></th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Conversation</th>

                                </tr>
                            </thead>
                            <tbody id="myTable">
                             @foreach($allmessages as $row) 
                         
                             <tr>
                                <td style="width:50px;"><span>
                                    @if($row->image)
                                    <img src="{{url('public/clients/'.$row->image)}}" alt="user" width="50">
                                    @else
                                    <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px">
                                    @endif
                                </span><br><br></td>
                                <td>
                                    <h6>{{$row->intake_name}}</h6><small class="text-muted">{{$row->message}}</small><br><br><small class="text-muted">{{$row->time}}</small></td>
                                    <td><small class="text-muted">{{$row->date}}<br><br><br><br></small></td>
                                    <td>
                                        <a href="{{url('conversation/'.$row->intakeco_id)}}" class="" title=""> <img src="{{url('public/images/inbox.jpg')}}" alt="view"  style="height: 20px"></a>
                                    </td> 
                                </tr> 
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        <div class="tab-pane fade show fade" id="nav-Coordinator" role="tabpanel" aria-labelledby="nav-Coordinator-tab">
    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover earning-box">
                               <thead class="bg-light">
                                  <tr class="tblhd1">
                                    <th></th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Conversation</th>

                                </tr>
                            </thead>
                            <tbody id="myTable">
                             @foreach($caregiver_messages as $row) 
                         
                             <tr>
                                <td style="width:50px;"><span>
                                    @if($row->image)
                                    <img src="{{url('public/clients/'.$row->image)}}" alt="user" width="50" height="50">
                                    @else
                                    <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px" height="50">
                                    @endif
                                </span><br><br></td>
                                <td>
                                    <h6>{{$row->name}}</h6><small class="text-muted">{{$row->message}}</small><br><br><small class="text-muted">{{$row->time}}</small></td>
                                    <td><small class="text-muted">{{$row->date}}<br><br><br><br></small></td>
                                    <td>
                                        <a href="{{url('caregiver_conversation/'.$row->caregiver_id)}}" class="" title=""> <img src="{{url('public/images/inbox.jpg')}}" alt="view"  style="height: 20px"></a>
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


        <!-- Column -->
    </div>


</div>
<!-- footer -->


</div>
<!-- End Page wrapper  -->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">

    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link tab_css active" id="nav-schedule-tab" data-toggle="tab" href="#nav-schedule" role="tab" aria-controls="nav-schedule" aria-selected="false">Caregiver</a>

            <a class="nav-item tab_css nav-link" id="nav-Profile-tab" data-toggle="tab" href="#nav-Profile" role="tab" aria-controls="nav-Profile" aria-selected="false">Intake Coordinator</a>
        </div>
    </nav>
    <!-- Tab menus -->
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <!--  schedules tab menu -->
        <div class="tab-pane fade show active" id="nav-schedule" role="tabpanel" aria-labelledby="nav-schedule-tab">
         <form method="POST" action="{{ route('caregiversms') }}" class="form-horizontal" enctype="multipart/form-data">
        <div class="modal-body">
            @csrf
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group row">
                      <label class="control-label text-right lbl2 col-md-3">Send To</label>
                      <div class="col-md-9">
                         <select class="form-control custom-select" name="caregiver_id">
                         @foreach($caregiver as $row)      
                          <option value="{{$row->id}}">{{$row->name}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
          </div>
      </div> 
      <div class="row">

        <div class="col-md-12">
            <div class="form-group row">
              <label class="control-label text-right lbl2 col-md-3">Message</label>
              <div class="col-md-9">
                <textarea  type="text" class="form-control" name="message" placeholder="Message" rows="5"></textarea>

            </div>
        </div>
    </div>
</div> 
</div>
<div class="modal-footer">
    <button type="submit" class="btn regbtn2">Send Message</button>
</div>
</form>
</div>


<div class="tab-pane fade show fade" id="nav-Profile" role="tabpanel" aria-labelledby="nav-Profile-tab">
           <form method="POST" action="{{ route('intakecosms') }}" class="form-horizontal" enctype="multipart/form-data">
        <div class="modal-body">

    <div class="row">
@csrf
        <div class="col-md-12">
            <div class="form-group row">
              <label class="control-label text-right lbl2 col-md-3">Send To</label>
              <div class="col-md-9">
               <select class="form-control custom-select" name="intakeco_id">
                         @foreach($intakeco as $row)      
                          <option value="{{$row->id}}">{{$row->intake_name}}</option>
                          @endforeach
                      </select>
          </div>
      </div>
  </div>
</div> 
<div class="row">

    <div class="col-md-12">
        <div class="form-group row">
          <label class="control-label text-right lbl2 col-md-3">Message</label>
          <div class="col-md-9">
            <textarea  type="text" class="form-control" name="message" placeholder="Message" rows="5"></textarea>

        </div>
    </div>
</div>
</div> 


</div>
<div class="modal-footer">
    <button type="submit" class="btn regbtn2">Send Message</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- End Wrapper -->
<!-- All Jquery -->
@endsection
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
@endsection
