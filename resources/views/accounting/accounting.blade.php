@extends('layouts.admin_header')
@section('content')
<div class="page-wrapper">
    <!--  -->
    <div class="container-fluid">
        <nav class="m-5">
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link tab_css active" id="nav-Summary-tab" data-toggle="tab" href="#nav-Summary" role="tab" aria-controls="nav-Summary" aria-selected="false">Billing</a>

                <a class="nav-item nav-link tab_css" id="nav-Note-tab" data-toggle="tab" href="#nav-Note" role="tab" aria-controls="nav-Note" aria-selected="false">Payroll</a>

                <a class="nav-item nav-link tab_css" id="nav-Timesheet-tab" data-toggle="tab" href="#nav-Timesheet" role="tab" aria-controls="nav-Timesheet" aria-selected="true">Invoice</a>

                <a class="nav-item nav-link tab_css" id="nav-Edit-tab" data-toggle="tab" href="#nav-Edit" role="tab" aria-controls="nav-Edit" aria-selected="false">Finance Report</a>

                <a class="nav-item nav-link tab_css" id="nav-Copy-tab" data-toggle="tab" href="#nav-Copy" role="tab" aria-controls="nav-Copy" aria-selected="false">Holidays</a>

                <a class="nav-item nav-link tab_css" id="nav-Delete-tab" data-toggle="tab" href="#nav-Delete" role="tab" aria-controls="nav-Delete" aria-selected="false">QuickBooks Integration</a>

            </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

            <!--  schedules tab menu -->
<div class="tab-pane fade show active" id="nav-Summary" role="tabpanel" aria-labelledby="nav-Summary-tab">
    <div class="row  m-auto">
       <!--  <div class="col-md-4">
            <label class="control-label term1">Care date</label>
            <input type="date" class="form-control iptx" placeholder="31-12-2020" name="phone" required>
        </div> -->

        <div class="col-md-4">
            <label class="control-label term1">Clients name</label>
            <input type="text" class="form-control iptx" id="myInput" placeholder="Name" name="phone" required>
        </div>
       <!--  <div class="col-md-2">
            <label class="control-label term1"><br></label>

            <input type="Button" class="form-control regbtn2" +++++placeholder="Name" value="Go" name="phone" required>
        </div> -->
    </div>


<div class="card-body">
<div class="table-responsive">
<table class="table table-hover earning-box">
<thead class="bg-light">
   <tr class="tblhd1">
        <th></th>
        <th>Client Name</th>
        <th>Working Hours</th>
        <th>Rate</th>
        <th>Total</th>
    </tr>
</thead>
 <tbody id="myTable" class="tblbd1">                                   
   <tr><td colspan="8"></td></tr>
           
         @foreach($approveclients as $row)                           
        <tr class="bg-light tblbd1 rounded">
           
        <td><span class="round"><img  src="public/images/person.png" width="50"></span></td>
        <td>
        <h6>{{$row->client_name}}</h6><small class="text-muted">{{$row->email}}</small></td>
        <td><span>{{$row->working_hrs}}</span></td>
        <td>{{$row->payroll}}</td>
        <td><?php 
        $num=$row->payroll;
        $timeUnit=$row->working_hrs;
        $timeUnit;
        $time=explode(":",$timeUnit);
        $waitingTime=$num*$time[0];
$mintime=($num/60)*$time[1];
 
$rr=$waitingTime+$mintime ;
        $minute = sprintf("%02d", ($waitingTime%60));
        $hour = sprintf("%02d", ($waitingTime/60));
        $current_time = floor($hour).':'.($minute);
        echo $rr;
         ?></td>
        </tr>
        @endforeach
     
            </tbody>
        </table>
    </div>
</div>
</div>

            <!-- Note tab menu -->

<div class="tab-pane fade show fade" id="nav-Note" role="tabpanel" aria-labelledby="nav-Note-tab">
    <div class="row  m-auto">
       <!--  <div class="col-md-4">
            <label class="control-label term1">Care date</label>
            <input type="date" class="form-control iptx" placeholder="31-12-2020" name="phone" required>
        </div> -->

        <div class="col-md-4">
             <input type="text" class="form-control iptx" placeholder="Search.." name="phone" required>
        </div>
      <!--   <div class="col-md-2">
            <label class="control-label"><br></label>

            <input type="Button" class="form-control regbtn2" +++++placeholder="Name" value="Go" name="phone" required>
        </div> -->
    </div>


<div class="card-body">
<div class="table-responsive">
<table class="table table-hover earning-box">
<thead class="bg-light">
   <tr class="tblhd1">
        <th></th>
        <th>Client Name</th>
        <th>Caregiver</th>
        <th>Payroll</th>

        <th>Rate</th>
        <th>Total</th>
    </tr>
</thead>
<tbody id="myTable" > 
   <tr><td colspan="8"></td></tr>
         @foreach($approveclients as $row)                           
        <tr class="bg-light tblbd1 rounded">
           
        <td><span class="round"><img  src="public/images/person.png" width="50"></span></td>
        <td>
        <h6>{{$row->client_name}}</h6><small class="text-muted">{{$row->email}}</small></td>
        <td><span>{{$row->name}}</span></td>
        <td>{{$row->caregiver_payroll}}</td>
                <td>{{$row->working_hrs}}</td>

        <td><?php 
        $num=$row->caregiver_payroll;
        $timeUnit=$row->working_hrs;
        $timeUnit;
        $time=explode(":",$timeUnit);
        $waitingTime=$num*$time[0];
$mintime=($num/60)*$time[1];
 
$rr=$waitingTime+$mintime ;
        $minute = sprintf("%02d", ($waitingTime%60));
        $hour = sprintf("%02d", ($waitingTime/60));
        $current_time = floor($hour).':'.($minute);
        echo $rr;
         ?></td>
        </tr>
          @endforeach

     
            </tbody>
        </table>
    </div>
   </div>
</div>

            <!-- Timesheet tab menu -->

            <div class="tab-pane fade show fade" id="nav-Timesheet" role="tabpanel" aria-labelledby="nav-Timesheet-tab">

 <div class="row m-auto">
        <!-- <div class="col-md-4">
            <label class="control-label">Care date</label>
            <input type="date" class="form-control iptx" placeholder="31-12-2020" name="phone" required>
        </div>
 -->
        <!-- <div class="col-md-4">
            <label class="control-label">Account type</label>
            <input type="text" class="form-control iptx" placeholder="Clients" name="phone" required>
        </div>
        <div class="col-md-2">
            <label class="control-label"><br></label>
            <input type="text" class="form-control iptx" placeholder="Adkins" name="phone" required>
        </div>
        <div class="col-md-2">
            <label class="control-label"><br></label>

            <input type="Button" class="form-control regbtn1" +++++placeholder="Name" value="Go" name="phone" required>
        </div> -->

          <div class="col-md-4">
             <input type="text" class="form-control iptx" placeholder="Search.." name="phone" required>
        </div>
    </div>


<div class="card-body">
<div class="table-responsive">
<table class="table table-hover earning-box">
<thead class="bg-light">
     <tr class="tblhd1">
        <th></th>
        <th>Client Name</th>
        <th>Working Hours</th>
        <th>Rate</th>
        <th>Total</th>
    </tr>
</thead>
<tbody id="myTable" class="tblbd1">                                   
   <tr><td colspan="8"></td></tr>
           
         @foreach($approveclients as $row)                           
        <tr class="bg-light tblbd1 rounded">
           
        <td><span class="round"><img  src="public/images/person.png" width="50"></span></td>
        <td>
        <h6>{{$row->client_name}}</h6><small class="text-muted">{{$row->email}}</small></td>
        <td><span>{{$row->working_hrs}}</span></td>
        <td>{{$row->payroll}}</td>
        <td><?php 
        $num=$row->payroll;
        $timeUnit=$row->working_hrs;
        $timeUnit;
        $time=explode(":",$timeUnit);
        $waitingTime=$num*$time[0];
        $mintime=($num/60)*$time[1];

        $rr=$waitingTime+$mintime ;
        $minute = sprintf("%02d", ($waitingTime%60));
        $hour = sprintf("%02d", ($waitingTime/60));
        $current_time = floor($hour).':'.($minute);
        echo $rr;
         ?></td>
        </tr>
        @endforeach
     
            </tbody>
        </table>
    </div>
   </div>          
     </div>


            <!-- Edit tab menu -->

            <div class="tab-pane fade show fade" id="nav-Edit" role="tabpanel" aria-labelledby="nav-Edit-tab">

       
 <div class="row m-auto">
        <div class="col-md-4">
            <label class="control-label">Care date</label>
            <input type="date" class="form-control iptx" placeholder="31-12-2020" name="phone" required>
        </div>

        <div class="col-md-4">
            <label class="control-label">Account type</label>
            <input type="text" class="form-control iptx" placeholder="Clients" name="phone" required>
        </div>
        <div class="col-md-2">
            <label class="control-label"><br></label>
            <input type="text" class="form-control iptx" placeholder="Adkins" name="phone" required>
        </div>
        <div class="col-md-2">
            <label class="control-label"><br></label>

            <input type="Button" class="form-control regbtn1" placeholder="Name" value="Go" name="phone" required>
        </div>
    </div>

 <div class="row m-auto">
        <div class="col-md-10 mt-3">
            <h5>Gross Profit Summary by Client</h5>
     <span>Date Range:02/02/2020-02/15/2020</span>
            </div>

       
        <div class="col-md-2 mt-3">
            <label class="control-label"><br></label>

            <input type="Button" class="form-control resetbtn float-right" value="Export" name="phone" required>
        </div>
    </div>

<div class="card-body">
<div class="table-responsive">
<table class="table table-hover earning-box">
<thead class="bg-light">
    <tr>
        <th colspan="2">Client Name</th>
        <th>Bill Reg</th>
        <th>Pay Reg</th>
        <th>Pay OT</th>
        <th>Revenue</th>
        <th>Payroll Expense</th>
        <th>Gross Profit</th>
        <th>Gross Margins</th>
        <th>&nbsp;</th>
    </tr>
</thead>
<tbody id="myTable" > 
   <tr><td colspan="10"></td></tr>
                                    
        <tr class="bg-light rounded">
           
        <td><span class="round"><img  src="" width="50"></span></td>
        <td>
        <h6>name</h6><small class="text-muted">Content Writer</small></td>
        <td><span>abcom</span></td>
        <td>+1234546</td>
        <td>+123</td>
        <td>12315</td>
        <td>2132</td>
        <td>500</td>
        <td>50%</td>
        <td><i class="mdi mdi-eye"></i></td>
        </tr>
     <tr><td colspan="10"></td></tr>
      <tr class="bg-light">
           
        <td><span class="round"><img  src="" width="50"></span></td>
        <td>
        <h6>name</h6><small class="text-muted">Content Writer</small></td>
        <td><span>abcom</span></td>
        <td>+1234546</td>
        <td>+123</td>
        <td>12315</td>
        <td>2132</td>
        <td>abc</td>
        <td>100</td>
        <td><i class="mdi mdi-eye"></i></td>

        </tr>
            </tbody>
        </table>
    </div>
   </div>          
            </div>


            <!-- Copy tab menu -->

            <div class="tab-pane fade show fade" id="nav-Copy" role="tabpanel" aria-labelledby="nav-Copy-tab">

       
 <div class="row m-auto">
        <div class="col-md-4">
            <label class="control-label">Care date</label>
            <input type="date" class="form-control iptx" placeholder="31-12-2020" name="phone" required>
        </div>

        <div class="col-md-4">
            <label class="control-label">Account type</label>
            <input type="text" class="form-control iptx" placeholder="Clients" name="phone" required>
        </div>
        <div class="col-md-2">
            <label class="control-label"><br></label>
            <input type="text" class="form-control iptx" placeholder="Adkins" name="phone" required>
        </div>
        <div class="col-md-2">
            <label class="control-label"><br></label>

            <input type="Button" class="form-control regbtn1" placeholder="Name" value="Go" name="phone" required>
        </div>
    </div>        </div>


            <!-- Delete tab menu -->

            <div class="tab-pane fade show fade" id="nav-Delete" role="tabpanel" aria-labelledby="nav-Delete-tab">

                QuickBooks
            </div>

</div>
</div>
</div>


            @endsection
          @section('javascript')
   
     <script>
  $(document).ready(function(){
    $(".iptx").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
            @endsection
