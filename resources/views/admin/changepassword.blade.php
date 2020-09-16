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
<div class="card-body">
<h2 class="card-title">Change Password</h2>
<form action="{{ route('newpassword') }}" method="Post" class="form-horizontal p-t-20">
@csrf

<div class="form-group row">
<label for="exampleInputuname3" class="col-sm-3 control-label">New Password</label>
<div class="col-sm-9">
<div class="input-group">

<input type="Password" class="form-control" id="exampleInputuname3" placeholder="New Password" name="newpassword" required>
</div>
</div>
</div>
<div class="form-group row">
<label for="exampleInputEmail3" class="col-sm-3 control-label">Confirm Password</label>
<div class="col-sm-9">
<div class="input-group">

<input type="Password" class="form-control" placeholder="Confirm Password" name="confirmpassword" required>
</div>
</div>
</div>

<div class="form-group row">
<div class="offset-sm-3 col-sm-6">
<button type="submit" class="regbtn form-control">Set A New Password</button>
</div>
</div>
</form>
</div>
</div>
</div>

</div>
</div>



@endsection
<!-- ============================================================== -->