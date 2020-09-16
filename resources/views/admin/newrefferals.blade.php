@extends('layouts.admin_header')
@section('content')
<div class="page-wrapper">
<div class="container-fluid">
<!-- Row -->
<div class="row mt-5">
<!-- Column -->
<div class="row p-20 w-100">
<div class="col-lg-9 col-xlg-9">
<h3 class="">New Clients</h3>
</div>
<div class="col-lg-3 col-xlg-4 float-right">
<input type="search" class="iptx form-control myInput" placeholder="Search Date" name="search">
</div>
</div>
<div class="col-lg-12 col-xlg-12">
<div class="card">
<nav>
<!-- <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
<a class="nav-item nav-link tab_css active" id="nav-Notification-tab" data-toggle="tab" href="#nav-Notification" role="tab" aria-controls="nav-Notification" aria-selected="false">Notification</a>
<a class="nav-item nav-link tab_css" id="nav-Payroll-tab" data-toggle="tab" href="#nav-Payroll" role="tab" aria-controls="nav-Payroll" aria-selected="false">Payroll Request</a>
</div> -->
</nav>
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-Notification" role="tabpanel" aria-labelledby="nav-Notification-tab">

<div class="card-body">
<div class="table-responsive">
<table class="table table-hover earning-box">
                                        <tbody id="myTable">
                                           @foreach($newreff as $row) 
                                            <tr>
                                                <td style="width:50px;"><span>
                                                    @if($row->image)
                                                    <img src="{{url('public/clients/'.$row->image)}}" alt="user" width="50">
                                                    @else
                                                    <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px">
                                                    @endif
                                                </span><br><br></td>
                                                <td>
                                                    <h6>{{$row->client_name}}</h6><small class="text-muted">{{$row->email}}</small><br><br><small class="text-muted">{{$row->phone}}</small></td>
                                                <td><small class="text-muted">{{$row->created_at}}<br><br><br><br></small></td>
                                              
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

</div>

</div>
</div>
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