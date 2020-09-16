@extends('layouts.admin_header')
@section('content')
<div class="page-wrapper">
	<div class="container-fluid">
		<h6 class="section-title h2 pt-5">FAQ</h6>

		<div class="row">

			<div class="card center1" style="width: 500px;">
				@if(session('message'))
				<p class="alert alert-dark">
				{{session('message')}}</p>
				@endif

				<div class="card-body">
					@if($faq->video == null)
					<form action="{{url('updatefaqquestion')}}" method="post" accept-charset="utf-8">
						{{ csrf_field() }}
						<input type="hidden" name="status" value="1" class="iptx">
						<input type="hidden" name="id" value="{{$faq->id}}" class="iptx">
						<div class="row mt-3">
							<label class="label-control lbl2">Questions</label>
							<input type="text" value="{{$faq->question}}" name="question" class="iptx">
						</div>

						<div class="row mt-3">
							<label class="label-control lbl2">Answer</label>
							<textarea type="text" name="answer" class="iptx" rows="5" cols="40">{{$faq->answer}}</textarea>
						</div>
						<div class="mt-3 row">
							<button type="submit" class="regbtn1 form-control center1">Update FAQ</button>
						</div>
					</form>
					@elseif($faq->video != null)

					<form action="{{url('updatefaqvideo')}}" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="status" value="2" class="iptx">
						<input type="hidden" name="id" value="{{$faq->id}}" class="iptx">

						<div class="row mt-3">
							<label class="label-control lbl2">Questions</label>
							<input type="text" name="question" value="{{$faq->question}}" class="iptx">
						</div>
						<div class="row mt-3">
							<div class="choose_file">
								<input type="file" name="video" class="m-2" placeholder="" value="{{$faq->video}}" required />
							</div>								
						</div>
						<div class="mt-3 row">
							<button type="submit" class="regbtn1 form-control center1">Update FAQ</button>
						</div>
					</form>
					@endif
				</div>
			</div>

		</div>

	</div>
</div>
@endsection