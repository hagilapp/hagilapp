<!-- Header -->


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!--Local CSS  -->
    <link rel="stylesheet" href="build/css/intlTelInput.css">
    <link rel="stylesheet" href="build/css/demo.css">
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
    .wrapper {
  padding: 10px;
}

.image--cover {
  width: 150px;
  height: 150px;
  border-radius: 50%;

  object-fit: cover;
  object-position: center right;
}
    </style>


  <!-- Link CSS -->
  <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard_theme_arrows.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
  integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
.btn-img {
  position: relative;
  display: inline-block;
  overflow: hidden;
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: 3px;
}
.btn-img:active {
  opacity:0.3;
  transition: opacity 0.1s;
}
.btn-img-gradient:hover::before, .btn-img-combo:hover::before {
  opacity: 1;
  transition: opacity 0.3s;
}
.btn-img-gradient::before, .btn-img-combo::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: block;
  z-index: 99;
  background-image: linear-gradient(
    to bottom right,
    rgba(255, 255, 255, 0.6),
    rgba(0, 0, 0, 0.3),
    rgba(0, 0, 0, 0.6)
  );
  opacity: 0;
  transition: opacity 0.3s;
}
.btn-img-shadow, .btn-img-combo {
  box-shadow: none;
  transition: box-shadow 0.5s;
}
.btn-img-shadow:hover, .btn-img-combo:hover  {
  border: 1px solid rgba(0,0,0,.3);
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
}
</style>

 


    <title>HAGILApp</title>
  </head>
  <body>
      








<div id="home" class="intro route bg-image" style="background-image: url(1155041.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
        
        <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success ">
                
               <a href="hero.php"><img style="height: 50px; width: 90px;" src="HAGILAPP.png" alt=""></a> 
                <div class="mb-3">
                <strong class="dark-text">
                    H A G I L A p p
                    </strong>
                </small>
                </div>
             
                <div class="alert alert-success" role="alert">
                        <strong>Successfully Registered!</strong> We automatically send a verification email to the email address you used to sign up for your account. Please, verify your account before you login.
                </div>
                            </div>
                <div class="card-body"> 
                          
                        <form action="loginConReg.php" method="POST">
                        <div class="form-group mb-3">
                            <label class="text-dark" for="">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-dark" for="">Password</label>
                            <input type="password" class="form-control" name="password"  placeholder="Password">
                        </div>
                        <p class="text-dark">Forgot your password? <a href="#"><strong>CLICK HERE</strong></a></p>
                        <div class="form-group mb-3">
                            <button type="submit" name="login" class="btn btn-primary">LOGIN</button>
                        </div>
                        </form>

                         
                </div>
            </div>
        </div>
  
          
                  </div>
      </div>
    </div>
  </div>
</div>


<?php include("includes/footer.php") ?>