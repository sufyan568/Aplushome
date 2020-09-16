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
					<nav class="">
						<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
							<a class="nav-item nav-link tab_css active" id="nav-faq-tab" data-toggle="tab" href="#nav-faq" role="tab" aria-controls="nav-faq" aria-selected="false">Add FAQ</a>

							<a class="nav-item nav-link tab_css" id="nav-Staff-tab" data-toggle="tab" href="#nav-Staff" role="tab" aria-controls="nav-Staff" aria-selected="false">Existing FAQ</a>

						</div>
					</nav>
				</div>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

					<!-- Add New Staff tab menu -->
					<div class="tab-pane fade show active" id="nav-faq" role="tabpanel" aria-labelledby="nav-faq-tab">
						<div class="card-body center1  p-5">
							<h3>FAQ Type</h3>
							<form action="{{url('faqquestion')}}" method="Post" class="form-horizontal">
								@csrf

					<nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a id="nav-Question-tab" data-toggle="tab" href="#nav-Question" role="tab" aria-controls="nav-Question" aria-selected="false" class="col-sm-6">
                 
                      <label class="label-control lbl2" for="question">Questions</label>
                    </a>   
                    <a id="nav-videos-tab" data-toggle="tab" href="#nav-videos" role="tab" aria-controls="nav-videos" aria-selected="false" class="col-sm-6">
                     
                      <label class="label-control lbl2" for="question">Videos</label>
                    </a>
                    </div>
                  </nav>
								<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

									<!-- Add New Staff tab menu -->
									<div class="tab-pane fade show active" id="nav-Question" role="tabpanel" aria-labelledby="nav-Question-tab">
										<form action="{{url('faqvideo')}}" method="post" accept-charset="utf-8">
									  {{ csrf_field() }}
										<input type="hidden" name="status" value="1" class="iptx">
										<div class="row mt-3">
											<label class="label-control lbl2">Questions</label>
											<input type="text" name="question" class="iptx">
										</div>

										<div class="row mt-3">
											<label class="label-control lbl2">Answer</label>
											<textarea type="text" name="answer" class="iptx" rows="5" cols="40"></textarea>
										</div>
								<div class="mt-3 row">
									<button type="submit" class="regbtn1 form-control center1">ADD FAQ</button>
								</div>
								</form>
									</div>

									<!-- Add New Staff tab menu -->
									<div class="tab-pane fade show fade" id="nav-videos" role="tabpanel" aria-labelledby="nav-videos-tab">
									<form action="{{url('faqvideo')}}" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
										@csrf
											<input type="hidden" name="status" value="2" class="iptx">

											<div class="row mt-3">
											<label class="label-control lbl2">Questions</label>
											<input type="text" name="question" class="iptx">
										</div>
										<div class="row mt-3">
											<div class="choose_file">
												<input type="file" name="video" class="m-2" />
											</div>								
										</div>
										<div class="mt-3 row">
									<button type="submit" class="regbtn1 form-control center1">ADD FAQ</button>
								</div>
							</form>
									</div>
								</div>
							</form>
						</div>
					</div>

					<!--  Exisiting staff tab menu -->
					<div class="tab-pane fade show fade" id="nav-Staff" role="tabpanel" aria-labelledby="nav-Staff-tab">
						<div class="card-body center1  p-5">
							<div class="row">
								<div class="float-left">
									<h3 class="fontfamily"><b>FAQ Type</b></h3>
								</div>
							</div>

								<nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a id="nav-ExQuestion-tab" data-toggle="tab" href="#nav-ExQuestion" role="tab" aria-controls="nav-ExQuestion" aria-selected="false" class="col-sm-6">
                    
                      <label class="label-control lbl2" for="question">Questions</label>
                    </a>   
                    <a id="nav-exvideos-tab" data-toggle="tab" href="#nav-exvideos" role="tab" aria-controls="nav-exvideos" aria-selected="false" class="col-sm-6">
               
                      <label class="label-control lbl2" for="question">Videos</label>
                    </a>
                    </div>
                  </nav>
								<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

									<!-- Existing questions tab menu -->
									<div class="tab-pane fade show active" id="nav-ExQuestion" role="tabpanel" aria-labelledby="nav-ExQuestion-tab">
							<div class="row m-1 pl-5 pr-5 pt-2 pb-2 bg-light">
								<div class="p-2 ">
									@foreach($question as $row)
									<div class="row">
									<div class="col-md-8">
									<h5 class="fontfamily">{{$row->question}}</h5>
								</div>
									<div class="col-md-2">
									<a href="{{url('/faqupdate/'.$row->id)}}" title=""><img src="{{ asset('public/icons/image/update.png')}}" alt="" class="sideicon"></a>
									</div>
									<div class="col-md-2">
									<a href="{{url('/faqdelete/'.$row->id.'/delete/')}}" onclick="return confirm('Are you sure you want to delete this Faq?')"  title=""><img src="{{ asset('public/icons/image/delete.png')}}" alt="" class="sideicon"></a>	
								</div>
								</div>
								
									<span class="edit1 text-muted mt-0">{{$row->answer}}</span>
									<br>
									<hr>
								@endforeach
								</div>
							
							</div>
						
						</div>	<!-- Existing questions tab menu -->
									<div class="tab-pane fade show fade" id="nav-exvideos" role="tabpanel" aria-labelledby="nav-exvideos-tab">
							<div class="row m-1 pl-5 pr-5 pt-2 pb-2 bg-light">
								<div class="p-2 ">
									@foreach($exvideo as $row)	<div class="row">
									<div class="col-md-8">
									<h5 class="fontfamily">{{$row->question}}</h5>
								</div>
									<div class="col-md-2">
									<a href="{{url('/faqupdate/'.$row->id)}}" title=""><img src="{{ asset('public/icons/image/update.png')}}" alt="" class="sideicon"></a>
									</div>
									<div class="col-md-2">
									<a href="{{url('/faqdelete/'.$row->id.'/delete/')}}" onclick="return confirm('Are you sure you want to delete this Faq?')"  title=""><img src="{{ asset('public/icons/image/delete.png')}}" alt="" class="sideicon"></a>	
								</div>
								</div>
									<video width="220" height="180" controls>
									  <source src="{{'public/video/'.$row->video}}" type="video/mp4">
									</video>
									<br>
									<hr>
								@endforeach
								</div>
							
							</div>
						
						</div>

					</div>
				</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	@endsection