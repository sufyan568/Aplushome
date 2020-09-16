@extends('layouts.admin_header')
@section('content')

<div class="page-wrapper">
<!-- Bread crumb and right sidebar toggle -->
<div class="container-fluid">

<section id="tabs">
<div class="container">
<h6 class="section-title h2 pt-5">Profile Details</h6>
<div class="row">
<div class="col-lg-12">
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
<div class="card cardclr1">
<div class="card-body">
<div class="d-flex no-block">
    <div class="abl1">
    <span class="round round-danger"><img  src="{{url('public/clients/'.$details->image)}}"  width="50"></span>
    </div>
    <div class="ml-3 abl1">
    <h6>{{$details->client_name}}</h6>
    <span class="edit1 text-muted mt-0">Content Writer</span><br>
    </div>
    <div class="ml-5">
        <hr class="hr1" style="">
    </div>
    <div class="ml-5 abl1">
    <span class="edit1">{{$details->email}}</span><br>
    <span class="edit1">{{$details->phone}}</span><br>
    <span class="edit1">Classification: {{$details->classification}}</span>

</div>
  <div class="ml-5">
        <hr class="hr1" style="">
    </div>
    <div class="ml-5 abl1">
    <a class="edit1" href="https://www.google.com/maps">VIEW MAPS</a><br>
    <span class="edit1"> {{$details->address}}</span>

</div>
  <div class="ml-5">
        <hr class="hr1" style="">
    </div>
    <div class="ml-5 abl1">
<button type="submit" class="resetbtn">ADD SCHEDULE</button>
</div>
</div>

</div>
<div class="card-body bg-white">
    <div>
        
    <p class="edit1 p-5">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>
    </div>
  <div class="ml-5 abl1">
<form action="{{ route('deactivate') }}" method="Post">
  {{ csrf_field() }}

<input type="hidden" name="id" value="{{$details->id}}">    
<input type="submit" class="resetbtn" value="Deactivate"  onclick="return confirm('Are you sure you want to deactivate this client?')" >
 </form>
</div>




</div>
</div>

</div>
</div>
</div>
</section>
</div>
</div>
@endsection
<!-- ============================================================== -->
