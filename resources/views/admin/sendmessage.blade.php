@extends('layouts.admin_header')
@section('content')
<div class="page-wrapper">
	<div class="container-fluid">

		<div class="row">

			<div class="card p-20 center1">
				@if(session('message'))
				<p class="alert alert-dark">
				{{session('message')}}</p>
				@endif

			<div class="card-body center1  p-5">
							<h3 class="text-center"><b>Send Message</b></h3>
							<form action="" method="Post" class="form-horizontal">
								@csrf

										<div class="row mt-3">
											<input type="text" name="username" placeholder="Subjext line" class="iptx">
										</div>

										<div class="row mt-3">
											<input type="file" name="username" placeholder="Upload Document" class="iptx">
										</div>

											<div class="row mt-3">
											<textarea type="text" name="username" class="iptx" rows="5" cols="40">Message</textarea>
										</div>
								<div class="mt-3 row">
									<button type="submit" class="regbtn1 form-control center1">SEND</button>
								</div>
								
							</form>
						</div>
				
				</div>
			</div>

</div>
</div>

	@endsection