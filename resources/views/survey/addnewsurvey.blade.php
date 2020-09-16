@extends('layouts.admin_header')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<div class="page-wrapper">
    <div class="container-fluid">
    <form action="{{route('createsurvey')}}" method="post" id="personalinfo" name="form2[]" accept-charset="utf-8" class="form1 navbar-light" ondrop="drop(event)" ondragover="allowDrop(event)">

@csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img src="https://www.aplushomecareonline.com/wp-content/themes/ahomecare/images/compname.png" class="img12" alt="A + Home" class="img-fluid" />

            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <button type="submit" class="btn regbtn2">Save</button>
                </div>
            </div>
        </div>
        <div class="row">
        <input type="hidden" name="survey_id" value="{{$random}}" class="iptx form-control">

            <div class="row center1 m-auto p-5">
            <label class="label-control lbl2">Survey Name</label>
            <input type="text" name="survey_name" class="iptx form-control">
            </div>
        </div>  
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
        <div class="row">
            <label class="label-control lbl12">Set Availablity</label>
        </div>
        <div class="row">
       <div class="col-md-6">     
<div class="ml-2" id="onetime">

<input type="checkbox" class="oneclick" id="chkPassport" name="onetime" value="1">
<label class="sm12">One Time
</label>
</div>
</div>
 <div class="col-md-6">
<div class="" id="recurring">

<input type="checkbox" id="recurring2"  class="answer" name="recurring" value="1">
<label class="sm12">Recurring
</label>
</div>
</div>  
</div>
 <div class="row">
    <div class="col-md-6">
        
<div class=" ml-2" id="weekly">

<input type="checkbox"  id="everyweek" name="weekly" value="1">
<label class="sm12">Every Week
</label>
</div>
    </div>
    <div class="col-md-6">
        
<div class="" id="everymonth">

<input type="checkbox"  id="monthly" name="monthly" value="1">
<label class="sm12">Every Month
</label>
</div>

</div>  
</div> 
</div> 
</div>
    <div id="fieldlist">
            </div>

        <div class="row mt-4">
                <div class="ml-3 col-md-3 col-sm-12 col-xs-12"></div>
                <div class="ml-3 col-md-4 col-sm-4 col-xs-4">
                    <button type="button" id="add" class="btn addnewbtn" >ADD QUESTION</button>
                </div>

            </div>
</form>
    </div>

</div>
</div>
@endsection


@section('javascript')

<script type="text/javascript">
$(function () {
        $("#chkPassport").click(function () {
             if ($(this).is(":checked")) {
                 $("#recurring").hide();
            } else {
                 $("#recurring").show();
            }
        });
    });


$(function () {
        $("#recurring2").click(function () {
             if ($(this).is(":checked")) {
                 $("#onetime").hide();
                                  $("#weekly").show();
                 $("#everymonth").show();

            } else {
                 $("#onetime").show();

                 $("#weekly").hide();
                 $("#everymonth").hide(); 
            }
        });
    });

$(function () {
        $("#everyweek").click(function () {
             if ($(this).is(":checked")) {
                 $("#everymonth").hide();

            } else {
                 $("#everymonth").show();
            }
        });
    });



$(function () {
        $("#monthly").click(function () {
             if ($(this).is(":checked")) {
                 $("#weekly").hide();
            } else {
                 $("#weekly").show();
            }
        });
    });




</script>


<script>
    $(document).ready(function(){
 $("#weekly").hide();
                  $("#everymonth").hide();

         var count = 1;
        dynamic_field(count);
        $(document).on('click', '#add', function(){
            count++;
            dynamic_field(count);
        });

    });
    $(function() {
        $("#add").click(function(e) {
            e.preventDefault();
/*
    $("#fieldlist").append("<div class='row'><div class='row center1 m-auto p-5' style='display:none;'><label class='label-control lbl2'>Quiz Name</label><input type='text' name='quizname' id='quizvalues' value='' class='iptx form-control'></div></div>");*/
    $("#fieldlist").append("<div class='row'><div class='row p-5 m-auto'><label class='label-control lbl2'>Question</label><textarea class='iptx form-control' name='survey_question[]' placeholder='How was your day?' cols='100' rows='5'></textarea></div></div>");
    $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>A.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><input type='text' class='abcd1 form-control' placeholder='Add Answer' name='option_a[]' required='required'></div></div>");
    $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>B.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><input type='text' class='abcd1 form-control' placeholder='Add Answer' name='option_b[]' required='required'></div></div>");
    $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>C.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><input type='text' class='abcd1 form-control' placeholder='Add Answer' name='option_c[]' required='required'></div></div>");
    $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>D.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><input type='text' class='abcd1 form-control' placeholder='Add Answer' name='option_d[]' required='required'></div></div>");
    $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>Correct Answer.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><select class='form-control abcd1 custom-select' name='correct_option[]'><option>Correct Answer</option><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select></div></div>");
});
    });

</script>

<script>
function myFunction() {
var number=document.getElementById("quizvalue").value; 
document.getElementById("quizvalues").value=number; 
}
</script>

@endsection