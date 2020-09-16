@extends('layouts.admin_header')
@section('content')
<div class="page-wrapper">
<div class="container-fluid">

<div class="row">

<div class="card center1 center2">
@if(session('message'))
<p class="alert alert-dark">
{{session('message')}}</p>
@endif

<div class="card-header">
<nav class="">
<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
<a class="nav-item nav-link active term1" id="nav-New-tab" data-toggle="tab" href="#nav-New" role="tab" aria-controls="nav-New" aria-selected="false">Add New</a>

<a class="nav-item nav-link term1" id="nav-Staff-tab" data-toggle="tab" href="#nav-Staff" role="tab" aria-controls="nav-Staff" aria-selected="false">Existing Staff</a>

</div>
</nav>
</div>
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

<!-- Add New Staff tab menu -->
<div class="tab-pane fade show active" id="nav-New" role="tabpanel" aria-labelledby="nav-New-tab">

<div class="card-body center1 p-5">
<form action="{{ route('createstaff') }}" method="Post" class="form-horizontal">
@csrf

<div class="row">
<label class="label-control">User Name</label>
<input type="text" name="name"value="{{ old('name') }}"  class="iptx @error('name') is-invalid @enderror">

@error('name')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
</div>


<div class="row">
<label class="label-control">E-mail</label>
<input type="text" name="email" value="{{ old('email') }}" required autocomplete="email" class="iptx  @error('email') is-invalid @enderror">

@error('name')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="row mt-3">
<label class="label-control">New Password</label>
<input type="password" class="iptx @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
</div>

<div class="row mt-3">
<label class="label-control">Confirm Password</label>
<input type="password" name="password_confirmation" required autocomplete="new-password" class="iptx">
</div>


<div class="row mt-3">
<input type="checkbox" name="username" class="chkbx2">
<label class="label-control">send users details to email</label>
</div>

<div class="mt-3 row">
<button type="submit" class="regbtn1 form-control center1">ADD NEW USER</button>
</div>
</form>
</div>
</div>

<!-- Exisiting staff tab menu -->
<div class="tab-pane fade show fade" id="nav-Staff" role="tabpanel" aria-labelledby="nav-Staff-tab">
<div class="card-body center1 p-5">
<div class="row">
<div class="float-left">
<h5>Total {{$totalstaff }} accounts</h5>
</div>
</div>
 @foreach($staff as $row) 
<div class="row m-1 pl-5 pr-5 pt-2 pb-2 bg-light">
		<div class="abl1 pr-3">
		<span class="round round-danger"><img src="public/assets/images/users/1.jpg" width="50"></span>
		</div>
		<div class="ml-3 abl1">
		<h6>{{$row->name}}</h6>
		<span class="edit1 text-muted mt-0">{{$row->email}}</span><br>
		</div>
		<div class="ml-3 pl-5 abl1">
		<i class="mdi mdi-account"></i>
		</div>

</div>
@endforeach





</div>
</div>
</div>
</div>
</div>
</div>
@endsection