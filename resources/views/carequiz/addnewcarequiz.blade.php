@extends('layouts.admin_header')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<div class="page-wrapper">
	<div class="container-fluid">
		<form action="{{route('createcarequiz')}}" method="post" id="personalinfo" name="form2[]" accept-charset="utf-8" class="form1 navbar-light" ondrop="drop(event)" ondragover="allowDrop(event)">
			@csrf
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<img src="https://www.aplushomecareonline.com/wp-content/themes/ahomecare/images/compname.png" class="img12" alt="A + Home" class="img-fluid" />

				</div>
				<div class="col-md-4">
					<div class="float-right">
						<button type="submit" id="save" class="btn regbtn2">Save</button>
					</div>
				</div>
			</div>
					<input type="hidden" name="quiz_id" value="{{$random}}" class="iptx form-control">
			<div class="row">
				<div class="row center1 m-auto p-5">
					<label class="label-control lbl2">Quiz Name</label>
					<input type="text" id="quizvalue" name="quizname" class="iptx form-control">
				</div>
			</div>	
			<div id="fieldlist">
			</div>

			<div class="row mt-4">
				<div class="ml-3 col-md-3 col-sm-12 col-xs-12"></div>
				<div class="ml-3 col-md-4 col-sm-4 col-xs-4">
					<button type="button" id="add" class="btn addnewbtn">ADD QUESTION</button>
				</div>

			</div>


		</form>
	</div>

</div>
</div>
@endsection


@section('javascript')
<script>
	$(document).ready(function(){
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
    $("#fieldlist").append("<div class='row'><div class='row p-5 m-auto'><label class='label-control lbl2'>Question</label><textarea class='iptx form-control' name='question[]' placeholder='How was your day?' cols='100' rows='5'></textarea></div></div>");
    $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>A.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><input type='text' class='abcd1 form-control' placeholder='Add Answer' name='answer_a[]' required='required'></div></div>");
    $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>B.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><input type='text' class='abcd1 form-control' placeholder='Add Answer' name='answer_b[]' required='required'></div></div>");
    $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>C.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><input type='text' class='abcd1 form-control' placeholder='Add Answer' name='answer_c[]' required='required'></div></div>");
    $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>D.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><input type='text' class='abcd1 form-control' placeholder='Add Answer' name='answer_d[]' required='required'></div></div>");
    $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>Correct Answer.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><select class='form-control abcd1 custom-select' name='correct_answer[]'><option>Correct Answer</option><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select></div></div>");
});
	});

</script>

@endsection