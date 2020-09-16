@extends('layouts.admin_header')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<div class="page-wrapper">
	<div class="container-fluid">
                <form action="{{url('surveyupdate')}}" method="post" accept-charset="utf-8">

		<div class="row">
		  <div class="col-md-6">
                   <span class="h2 fontfamily pt-5">Weekly Survey</span>
         
            </div>
			<div class="col-md-6">
				<div class="float-right">
					<button type="submit" class="btn regbtn2">Save</button>
				</div>
			</div>
		</div>
		
        @foreach($surveyview as $row)
            <div class="row">
            <div class="row p-5 m-auto">
            <label class="label-control lbl2">Question</label>
            <textarea class="iptx form-control" name="survey_question" placeholder="How was your day?" cols="100" rows="5">{{$row->survey_question}} </textarea>          
            </div>
            </div>  

@csrf
    <input type="hidden" class="abcd1 form-control" placeholder="survey id"  name="survey_id" value="{{$row->survey_id}}" >
    <input type="hidden" class="abcd1 form-control" placeholder="id"  name="id" value="{{$row->id}}" >

    <div class="row mt-2">
    <div class="col-md-3 col-sm-12 col-xs-12">
    <label for="Name" class="control-label float-right">A.</label>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
    <input type="text" class="abcd1 form-control" placeholder="Option"  name="option_a" value="{{$row->option_a}}" >

    </div> 
    </div>

    <div class="row mt-2">
    <div class="col-md-3 col-sm-12 col-xs-12">
    <label for="Name" class="control-label float-right">B.</label>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
    <input type="text" class="abcd1 form-control" placeholder="Option"  name="option_b" value="{{$row->option_b}}" >

    </div>          
    </div>
    <div class="row mt-2">
    <div class="col-md-3 col-sm-12 col-xs-12">
    <label for="Name" class="control-label float-right">C.</label>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
    <input type="text" class="abcd1 form-control" placeholder="Optionr"  name="option_c" value="{{$row->option_c}}" >

    </div>          
    </div>
    <div class="row mt-2">
    <div class="col-md-3 col-sm-12 col-xs-12">
    <label for="Name" class="control-label float-right">D.</label>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
    <input type="text" class="abcd1 form-control" placeholder="Option"  name="option_d" value="{{$row->option_d}}" >

    </div>          
    </div>
    @endforeach
</form>
	</div>

</div>
</div>
@endsection
