@extends('layouts.admin_header')
@section('content')
      <link href="{{ asset('public/css/chatbox.css') }}" rel='stylesheet' type='text/css' />

         <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
  
   <div class="container-fluid mt-5 h-100">
      <div class="row justify-content-center h-100">
       
        <div class="col-md-9 col-xl-8 chat">
          <div class="card">
            <div class="card-header msg_head">
              <div class="d-flex msg_head">
                <div class="img_cont">
                   
                  @if($caregiver->image) 
                  <img src="{{url('public/clients/'.$caregiver->image)}}" alt="view" class="img-circle" style="height: 70px" width="70px">
                  @else
                  <img src="{{url('public/images/person.png')}}" alt="view" class="img-circle" style="height: 50px">
                   @endif
                  <span class="online_icon"></span>
                </div>
                <div class="user_info">
                  <span> {{$caregiver->name}}</span>
<!--                   <p>1767 Messages</p>
 -->                </div>
              </div>
            </div>
            <div class="card-body msg_card_body" id="chat">
              <div id="me"></div>
            @foreach($conversation as $row)
            @if($row->type=='receive')
            <div class="d-flex justify-content-start mb-4">
            <div class="img_cont_msg">
            @if($caregiver->image) 
            <img src="{{url('public/clients/'.$caregiver->image)}}" alt="view" class="img-circle" style="height: 40px" width="40px">
            @else
            <img src="{{url('public/images/person.png')}}" alt="view" class="img-circle" style="height: 40px" width="40px">
            @endif

            </div>
            <div class="msg_cotainer">
            {{$row->message}}
            <span class="msg_time">{{$row->created_at}}</span>
            </div>
            </div>
            @elseif($row->type=='send')
            <div class="d-flex justify-content-end mb-4">
            <div class="msg_cotainer_send" >
            {{$row->message}}
            <span class="msg_time" >{{$row->created_at}}</span>
            </div>
            <div class="img_cont_msg">
            @if(Auth::user()->image) 
            <img src="{{url('public/admin/'.Auth::user()->image)}}" class="rounded-circle user_img_msg" alt="view" style="height: 40px" >
            @else
            <img src="{{url('public/images/person.png')}}" alt="view" class="img-circle" style="height: 40px">
            @endif
            </div>
            </div>
            @endif
            @endforeach
            </div> 
             <form id="send" method="post">
<input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
      <input type="hidden" name="caregiver_id" id="caregiver_id" value="{{$id}}">
            <div class="card-footer msg_head">
              <div class="input-group msg_head">
                <div class="input-group-append">
                  <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                </div>
                <textarea name="message" id="message" class="form-control" placeholder="Type your message..."></textarea>
                <div class="input-group-append">
                  <button class="input-group-text send_btn bg-white" type="submit"><img src="{{ asset('public/icons/image/circle_arrow.jpg')}}"  alt="" class="img_cont_msg"></button>
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>


    @endsection

<!-- ============================================================== -->
@section('javascript')

<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script>

$(document).ready(function () {
    var lastId = 0; //Set id to 0 so you will get all records on page load.
    var request = function () {
   var id = "<?php echo $id ?>"; 

    $.ajax({
          url: "{{ url('fetch_caregiver_message') }}"
          type:"GET",
          
          success:function(response){
          console.log(response);
           $('#me').append(response);        

          }, error: function () {
          console.log('not get');
          }
         });
    };
   setInterval(request, 1000);
});

</script> 
<script>
    $(document).ready(function($) {
    $('#send').on('submit',function(event){
         event.preventDefault();
         message = $('#message').val();
         token = $('#token').val();

        caregiver_id = $('#caregiver_id').val();

         $.ajax({
        headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },     
          url: "{{ url('conversation_caregiversms') }}",
          type:"POST",
          data:{
           token:token,      
           message:message, 
           caregiver_id:caregiver_id,          
          },
          success:function(response){
          console.log(response);
          $("#send")[0].reset();
 
          }, error: function () {
          console.log('error');
          }
         });
        });
 
        });
</script>
 
 <script type="text/javascript">
 $("#chat").animate({ scrollTop: $("#chat")[0].scrollHeight });

 </script>
  

@endsection
