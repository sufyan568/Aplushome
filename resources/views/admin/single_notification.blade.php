@extends('layouts.admin_header')
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row mt-5">
            <!-- Column -->
            <div class="row p-20 w-100">
                <div class="col-lg-9 col-xlg-9">
                    <h3 class="">Notifications</h3>
                </div>
                <div class="col-lg-3 col-xlg-4 float-right">
                    <input type="search" class="iptx form-control myInput" placeholder="Search Date" name="search">
                </div>
            </div>
            <div class="col-lg-12 col-xlg-12">
                <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover earning-box">
                                        <tbody id="myTable">
                                         <tbody id="myTable">
                                            @if($payrollrequest)
                                 <tr>
                                    <td style="width:50px;"><span>
                                        @if($payrollrequest->image)
                                        <img src="{{url('public/clients/'.$payrollrequest->image)}}" alt="user" width="50">
                                        @else
                                        <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px">
                                        @endif
                                    </span><br><br></td>
                                    <td>
                                        <h6>{{$payrollrequest->intake_name}}</h6><small class="text-muted">request to increase in payroll upto  {{$payrollrequest->payroll}}</small><br><br><small class="text-muted">{{$payrollrequest->time}}</small></td>
                                        <td><small class="text-muted">{{$payrollrequest->date}}<br><br><br><br></small></td>
                                        <td>
                                            <a href="{{url('approvepayroll/'.$payrollrequest->id)}}" class="" title=""> <img src="public/images/approve.png" alt="view" class="img-circle" style="height: 50px"></a>

                                        </td>
                                        <td>
                                            <a href="{{url('rejectpayrollreq/'.$payrollrequest->id)}}"> <img src="public/images/remove.jpg" alt="remove" class="img-circle" style="height: 50px"></a>

                                        </td> 
                                    </tr> 
                             @elseif($intakepayroll)
                                
                                 <tr>
                                    <td style="width:50px;"><span>
                                        @if($intakepayroll->image)
                                        <img src="{{url('public/clients/'.$intakepayroll->image)}}" alt="user" width="50">
                                        @else
                                        <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px">
                                        @endif
                                    </span><br><br></td>
                                    <td>
                                        <h6>{{$intakepayroll->intake_name}}</h6><small class="text-muted">request to increase in payroll upto  {{$intakepayroll->payroll}}</small><br><br><small class="text-muted">{{$intakepayroll->time}}</small></td>
                                        <td><small class="text-muted">{{$intakepayroll->date}}<br><br><br><br></small></td>
                                        <td>
                                            <a href="{{url('approvepayroll/'.$intakepayroll->id)}}" class="" title=""> <img src="public/images/approve.png" alt="view" class="img-circle" style="height: 50px"></a>

                                        </td>
                                        <td>
                                            <a href="{{url('rejectpayrollreq/'.$intakepayroll->id)}}"> <img src="public/images/remove.jpg" alt="remove" class="img-circle" style="height: 50px"></a>

                                        </td> 
                                    </tr> 
                   @elseif($caregiverpayroll)
                                 <tr>
                                    <td style="width:50px;"><span>
                                        @if($caregiverpayroll->image)
                                        <img src="{{url('public/clients/'.$caregiverpayroll->image)}}" alt="user" width="50">
                                        @else
                                        <img src="public/images/person.png" alt="view" class="img-circle" style="height: 50px">
                                        @endif
                                    </span><br><br></td>
                                    <td>
                                        <h6>{{$caregiverpayroll->name}}</h6><small class="text-muted">request to increase in payroll upto  {{$caregiverpayroll->payroll}}</small><br><br><small class="text-muted">{{$caregiverpayroll->time}}</small></td>
                                        <td><small class="text-muted">{{$caregiverpayroll->date}}<br><br><br><br></small></td>
                                       
                                    </tr> 
                                    @endif

                                    
                                </tbody>
                                    </tbody>
                                </table>
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