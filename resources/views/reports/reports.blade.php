@include('layouts.admin_header')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="d-flex ml-4">
                <div class="align-self-center">
                    <h2 class="m-b-0 hd12">Reports</h2>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 ml-4">
            <label class="control-label text-right lbl2"></label>
            <div class="row">
                <input type="search" id="iptx" class="form-control iptx col-md-6" placeholder="Search" name="search">&nbsp;&nbsp;
              
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <h5 class="fontfamily ml-4">Recent Reports</h5>
    </div>
    <div class="card ">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover earning-box">
                    <tbody id="myTable">
                        @foreach($report as $row)
                        <tr>
                            <td style="width:50px;"><span class="round">
                                @if($row->image) 
                                <img src="{{url('public/images/doc.png')}}" alt="user" width="50">
                                @else
                                <img src="{{url('public/images/doc.png')}}" alt="view" class="img-circle" style="height: 50px">
                                @endif
                            </span><br></td>
                            <td colspan="2">
                                <h6>{{$row->title}}</h6><small class="text-muted">{{$row->created_at}}</small></td>
                                <td><a href="{{url('/filedownload/'.$row->id)}}" title=""><img src="{{ asset('public/icons/image/download.png')}}" alt="" class="sideicon"></a></td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
</div>


         @section('javascript')
   
     <script>
  $(document).ready(function(){
    $("#iptx").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
            @endsection
