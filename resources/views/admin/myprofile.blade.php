@extends('layouts.admin_header')
@section('content')
<div class="page-wrapper">
<div class="container-fluid">

<div class="row">
<div class="card center1 center2 p-5">
@if(session('message'))
<p class="alert alert-dark">
{{session('message')}}</p>
@endif
<div class="card-body pl-5 pr-5">
<h2 class="text-center fgbtn3">My Profile</h2>
<form action="" method="Post" class="form-horizontal p-t-20">
@csrf

<div class="row">
<div class="center1"><img src="{{url('public/admin/'.Auth::user()->image)}}" class="img-circle img12" alt="user" style="height: 180px;"></div>
</div>


<div class="row">
<label class="center1 term1 mt-3">{{ Auth::user()->name }}</label>

</div>

<div class="mt-3 row">
<a href="{{url('/viewprofile')}}" class="center1">Edit</a>
</div>
</form>
</div>
</div>
</div>

</div>
</div>



@endsection