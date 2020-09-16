<div class="container-fluid">
<div class="row">
    <div class="img1">
        <div>
        <img src="public/images/loginimage1.png" alt=" img-fluid" class="logimg">
    </div>
</div>
    <div class="lgn1">
        <div class="row">
            <span class="logo1"><b>Reset Password</b></span>
        </div>

  <div class="row mt-3">
            <span class="term1 ml-3" >Select which contact details should be used to <br> reset your password.</span>
        </div>
<div class="recover1"></div>

  <form action="{{ route('sendemail') }}" method="Post">
  <div class="row rstclr1 p-2">
    <div class=" p-2">
        <img src="public/images/Icon.svg" alt=" img-fluid" class="logimg2">
    </div>
     {{ csrf_field() }}

    <div class="p-2">
           @if(session('message'))
              <p class="alert alert-dark">
              {{session('message')}}</p>
              @endif
    <div class="p-2 email5">
               <span class="email1"><br><b>Via email address</b></span> <br>
    <input type="email" name="email" class="iptx" placeholder="*****ab@gmail.com">
    </div>
    <div class="email1">
    <input type="submit"  class="resetbtn1 ml-4" value="Send Email">
    </div>
      
    </div>
  </div>
    </form>

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
