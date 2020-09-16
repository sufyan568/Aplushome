@extends('layouts.admin_header')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<div class="page-wrapper">
  <div class="container-fluid">

    <section id="tabs">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-4 col-sm-6">
            <span class="h2 fontfamily pt-5">Care Quiz</span>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="{{url('/seeresult/'.$id)}}"><button type="button" class="btn regbtn2">See Result</button></a>

          
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6">
                    <button type="button" id="add1" class="btn addnewbtn">ADD QUESTION</button>
            
          </div>
</div>
        </div>
        <div class="row mt-3 center1">
          <div class="col-lg-12">
            <div class="table-responsive card">
              <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-light card-header" style="background-color: #ECECEC;">
                  <tr class="tblhd1">
                    <th>Quiz Name</th>
                    <th>Question Name</th>
                    <th>Correct Answer</th>
                                        <th>Actionr</th>

                    </tr>
                </thead>
                <tbody class="card-body">
                 @foreach($view as $row)
                 <tr class="">
                  <td>{{$row->quizname}}</td>
                  <td>{{$row->question}}</td>
                  <td>{{$row->correct_answer}}</td>
                  
<td>
                    <a href="{{url('quizview/'.$row->id)}}" title=""><img src="{{ asset('public/icons/image/update.png')}}" alt="" class="sideicon"></a>
                    <a href="{{url('/carequiz/'.$row->id.'/delete/')}}" onclick="return confirm('Are you sure you want to delete this quiz?')"  title=""><img src="{{ asset('public/icons/image/delete.png')}}" alt="" class="sideicon"></a>
                  </td>
@endforeach
                </tr>   
               

                      </div>
                    </table>
                  </div>
                </div>
              </div>


            </div>
          </div>
            <form action="{{route('createanothercarequiz')}}" method="post" id="personalinfo" name="form2[]" accept-charset="utf-8" class="form1 navbar-light" ondrop="drop(event)" ondragover="allowDrop(event)">
              <input type="hidden" name="quiz_id" value="{{$id}}">
                            <input type="hidden" name="quizname" value="{{$quizname}}">

                    @csrf

            <div id="fieldlist">
            </div>
            <div class="row">
                        <button type="submit" id="save" class="btn m-auto mt-2 regbtn2">Save</button>
</div>
          </form>

         
    
          @endsection




@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
                       $("#save").hide();

        var count = 1;
        dynamic_field(count);
        $(document).on('click', '#add1', function(){
            count++;
            dynamic_field(count);
        });

    });
    $(function() {
        $("#add1").click(function(e) {
            e.preventDefault();

          $("#save").show();

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