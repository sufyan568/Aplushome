@extends('layouts.admin_header')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<div class="page-wrapper">
    <div class="container-fluid">
        <form action="{{url('carequizupdate')}}" method="post" accept-charset="utf-8">
            <div class="row">
                <div class="col-md-6">
                   <span class="h2 fontfamily pt-5">Quiz 1 View</span>

               </div>
               <div class="col-md-6">
                <div class="float-right">
                    <button type="submit" class="btn regbtn2">Update</button>
                </div>
            </div>
        </div>
        @foreach($quizupdate as $row)
        <input type="hidden" class="abcd1 form-control" placeholder="Add Answer"  name="id" value="{{$row->id}}" >
        <input type="hidden" class="abcd1 form-control" placeholder="Add Answer"  name="quiz_id" value="{{$row->quiz_id}}" >

        <div class="row">
            <div class="row p-5 m-auto">
                <label class="label-control lbl2">Question</label>
                <textarea class="iptx form-control" name="question" placeholder="How was your day?" cols="100" rows="5">{{$row->question}} </textarea>
            </div>
        </div>  

        @csrf

        <div class="row mt-2">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <label for="Name" class="control-label float-right">A.</label>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="text" class="abcd1 form-control" placeholder="Add Answer"  name="answer_a" value="{{$row->answer_a}}" >

            </div> 
        </div>

        <div class="row mt-2">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <label for="Name" class="control-label float-right">B.</label>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="text" class="abcd1 form-control" placeholder="Add Answer"  name="answer_b" value="{{$row->answer_b}}" >

            </div>          
        </div>
        <div class="row mt-2">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <label for="Name" class="control-label float-right">C.</label>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="text" class="abcd1 form-control" placeholder="Add Answer"  name="answer_c" value="{{$row->answer_c}}" >

            </div>          
        </div>
        <div class="row mt-2">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <label for="Name" class="control-label float-right">D.</label>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="text" class="abcd1 form-control" placeholder="Add Answer"  name="answer_d" value="{{$row->answer_d}}" >

            </div>          
        </div>
        <div class="row mt-2">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <label for="Name" class="control-label float-right">Correct Answer.</label>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="text" class="abcd1 form-control" placeholder="Add Answer"  name="correct_answer" value="{{$row->correct_answer}}" >

            </div>          
        </div>

        @endforeach
    </form>

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
            $("#fieldlist").append("<div class='row'><div class='row p-5 m-auto'><label class='label-control lbl2'>Question</label><textarea class='iptx form-control' name='question[]' placeholder='How was your day?' cols='100' rows='5'></textarea></div></div>");
            $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>A.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><input type='text' class='abcd1 form-control' placeholder='Add Answer' name='answer_a[]' required='required'><span class='label label-danger fontfamily'>An answer is required...</span></div></div>");
            $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>B.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><input type='text' class='abcd1 form-control' placeholder='Add Answer' name='answer_b[]' required='required'></div></div>");
            $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>C.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><input type='text' class='abcd1 form-control' placeholder='Add Answer' name='answer_c[]' required='required'></div></div>");
            $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>D.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><input type='text' class='abcd1 form-control' placeholder='Add Answer' name='answer_d[]' required='required'></div></div>");
            $("#fieldlist").append("<div class='row mt-2'><div class='col-md-3 col-sm-12 col-xs-12'><label for='Name' class='control-label float-right'>Correct Answer.</label></div><div class='col-md-6 col-sm-12 col-xs-12'><select class='form-control abcd1 custom-select' name='correct_answer[]'><option>Correct Answer</option><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select></div></div>");
        });
    });

</script>


@endsection