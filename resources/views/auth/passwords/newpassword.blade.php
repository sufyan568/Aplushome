<div class="container-fluid">

<div class="row">
    <div class="img1">
        <div>
        <img src="public/images/bg1.png" alt="" class="logimg">
    </div>
</div>
    <div class="lgn1">
        <div class="row">
            <span class="logo1"><b>Reset Password</b></span>
        </div>
      <form method="POST" action="{{ route('updatepassword') }}">
          @csrf
          <input type="hidden" name="email" value="{{$email}}">
          <div class="row">
             @if(session('message'))
              <p class="alert alert-dark">
              {{session('message')}}</p>
              @endif
                   
                <label for="email" class="col-lg-10 col-md-12 col-sm-12 sm12 emtp1">New Password </label>

                <div class="col-lg-10 col-md-12 col-sm-12 ">
                      <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password">

                                
            </div>
    </div>
    <div class="row mt-4">


                <label for="password" class="col-lg-10 col-md-12 col-sm-12 control-label sm12">Confirm Password</label>

                <div class="col-lg-10 col-md-12 col-sm-12  ">
                    <input id="password-confirm" type="password" class="form-control" name="confirmpassword" required autocomplete="new-password">

                                    </div>
        </div>

   
<div class="row mt-4">
            <div class="col-lg-10 col-md-12 col-sm-12">
                <input type="submit" class="regbtn form-control" value="SET A NEW PASSWORD">
    </div>
</div>
 
</form>
</div>
</div>
</div>

</body>
</html>
<!DOCTYPE html>
 <html>
 <head>

  <link rel="stylesheet" href="public/css/bootstrap/css/bootstrap.css" >
  <link rel="stylesheet" href="public/css/bootstrap/css/bootstrap.min.css" >
  <link rel="stylesheet" href="public/css/bootstrap/css/bootstrap-grid.css" >
  <link rel="stylesheet" href="publicpublic/css/bootstrap/css/bootstrap-grid.min.css" >
  <link rel="stylesheet" href="public/css/bootstrap/css/bootstrap-reboot.css" >
  <link rel="stylesheet" href="public/css/bootstrap/css/bootstrap-reboot.min.css" >
  <link rel="stylesheet" href="public/css/fontawesome/css/fontawesome.css" >
  <link rel="stylesheet" href="public/css/fontawesome/css/fontawesome.min.css" >
  <link rel="stylesheet" href="public/css/fontawesome/css/all.css" >
  <link rel="stylesheet" href="public/css/fontawesome/css/all.min.css" >
  <link rel="stylesheet" href="public/css/register.css" >

  <title>A + Home</title>
  <script src="public/css/bootstrap/js/bootstrap.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="public/css/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="public/css/bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="public/css/bootstrap/js/bootstrap.bundle.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="public/css/fontawesome/js/all.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="public/css/fontawesome/js/all.min.js" type="text/javascript" charset="utf-8" async defer></script>

</head>
<body style="background-color: #ffffff; !important;">
