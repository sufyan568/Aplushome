<div class="container-fluid">
<div class="row">
  <div class="img1">
    <div>
      <img src="public/images/loginimage1.png" alt=" img-fluid" class="logimg">
    </div>
  </div>
  <div class="lgn1">
    <div class="row">
      <span class="logo1"><b>Login</b></span>
    </div>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="row">

        <label for="email" class="col-lg-12 col-md-10 col-sm-10 sm12 emtp1">Email </label>

        <div class="col-lg-10 col-md-10 col-sm-10 ">
          <input id="email" type="email" class="iptx " placeholder="admin@gmail.com" name="email" value="" required autocomplete="email" autofocus>

        </div>
      </div>
      <div class="row mt-4">


        <label for="password" class="col-lg-10 col-md-10 col-sm-10 control-label sm12">Password</label>

        <div class="col-lg-10 col-md-10 col-sm-10  ">
          <input id="password" type="password" class="iptx  " name="password" required autocomplete="current-password" placeholder="*******">

        </div>
      </div>

      <div class="row mt-3 ">
        <div class="col-lg-10 col-md-10 col-sm-10 ">
          <input class="form-check-input rmb5" type="checkbox" name="remember" id="remember"  >
          <span class="form-check-label  term2" for="remember">
            Remember login info
          </span>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-10 col-md-10 col-sm-10">
          <input type="submit" class="regbtn form-control" value="LOGIN">
        </div>
      </div>
      <div class="row mt-4">
        <a class="text-center term3" href="{{ route('resetpassword') }}">
         Reset Password?
       </a>
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
  <link rel="stylesheet" href="public//css/bootstrap/css/bootstrap.min.css" >
  <link rel="stylesheet" href="public//css/bootstrap/css/bootstrap-grid.css" >
  <link rel="stylesheet" href="public//css/bootstrap/css/bootstrap-grid.min.css" >
  <link rel="stylesheet" href="public//css/bootstrap/css/bootstrap-reboot.css" >
  <link rel="stylesheet" href="public//css/bootstrap/css/bootstrap-reboot.min.css" >
  <link rel="stylesheet" href="public//css/fontawesome/css/fontawesome.css" >
  <link rel="stylesheet" href="public//css/fontawesome/css/fontawesome.min.css" >
  <link rel="stylesheet" href="public//css/fontawesome/css/all.css" >
  <link rel="stylesheet" href="public//css/fontawesome/css/all.min.css" >
  <link rel="stylesheet" href="public//css/register.css" >

  <title>A + Home</title>
  <script src="public//css/bootstrap/js/bootstrap.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="public//css/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="public//css/bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="public//css/bootstrap/js/bootstrap.bundle.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="public//css/fontawesome/js/all.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="public//css/fontawesome/js/all.min.js" type="text/javascript" charset="utf-8" async defer></script>

</head>
<body style="background-color: #ffffff; !important;">
