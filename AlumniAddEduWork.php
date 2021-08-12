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

  <link rel="stylesheet" href="build/css/intlTelInput.css">
  <link rel="stylesheet" href="build/css/demo.css">
      

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
      



<?php  
include('auth.php');

$uid = $_SESSION['verified_user_id']; 
$user = $auth->getUser($uid);
?>

<?php include('src/firebasePHP.php'); $getData = $database->getReference('AUserList')->getChild($uid)->getValue();?>



<div class="container ">
    
    <div class="row justify-content-center">

            <div class="alert alert-secondary mt-3 row" role="alert">
            <strong>Add Education and Work Experiece</strong>
            </div>
            

                <div class="card col-8 mt-3">
                    <div class="card-body">
                        <h3>Education Background</h3><hr>

                        <div class="card">
                          <form action="main.php" method="POST">
                        <?php 
                                include('src/firebasePHP.php');
                                $getData = $database->getReference("EduWork/Education/$uid")->getValue();

                                if($getData > 0){
                                    $i = 1;
                                    
                                    foreach($getData as $key => $row){
                                        ?>

                                        <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><?=$row['course']; ?> (<?=$row['syStart']; ?> to <?=$row['syEnd']; ?>)</h5>
                                            <h6 class="card-subtitle mb-2 text-muted"> <?=$row['school']; ?></h6>
                                            <h6 class="card-text">
                                            <label for="">Address:</label>
                                            <?=$row['sAddress'];?>
                                            </h6>
                                            
                                            <button type="submit" class="btn btn-danger" name="deleteEdu" value="<?=$key?>" ><i class="fa fa-times" aria-hidden="true"></i>DELETE</button>
                                        </div>
                                    </div>
                                        <?php

                                    }

                                }
                                else{

                                    // echo "No Data";

                                }
                                
                                ?> 
                             </form>
                                <button type="button" class="btn btn-primary mt-4   " data-toggle="modal" data-target="#edu">Add</button>
                              
                        </div>
                    </div>
                    
                </div>     

                <div class="card col-8 mt-3">
                    <div class="card-body">
                        <h3>Work Experience</h3><hr>

                        <div class="card">
                          <form action="main.php" method="POST">
                        <?php 
                                include('src/firebasePHP.php');
                                $getData = $database->getReference("EduWork/Work/$uid")->getValue();

                                if($getData > 0){
                                    $i = 1;
                                    
                                    foreach($getData as $key => $row){
                                        ?>

                                        <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><?=$row['title']; ?> (<?=$row['wStart']; ?> to <?=$row['wEnd']; ?>)</h5>
                                            <h6 class="card-subtitle mb-2 text-muted"> <?=$row['company']; ?></h6>
                                            <h6 class="card-text">
                                            <label for="">Address:</label>
                                            <?=$row['wAddress'];?>
                                            </h6>
                                            <h6 class="card-text">
                                            <label for="">Salary Range (Monthly):</label>
                                            <?=$row['salary'];?>
                                            </h6>
                                            <h6 class="card-text">
                                            <label for="">Job Description:</label>
                                            <p><?=$row['wDes'];?></p>
                                            </h6>
                                            
                                            <button type="submit" class="btn btn-danger" name="deleteWork" value="<?=$key?>" ><i class="fa fa-times" aria-hidden="true"></i>DELETE</button>
                                        </div>
                                    </div>
                                        <?php

                                    }

                                }
                                else{

                                    // echo "No Data";

                                }
                                
                                ?> 
                             </form>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#work">Add</button>
                               
                        </div>
                    </div>
                    <a href="AlumniMainProfile.php" class="btn btn-primary mb-5">Go to My Profile</a>
                    
                </div>      
            </div>

    <?php
    ?>
</div>


<div class="modal" id="edu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredLabel">Add Education</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="main.php" method="POST">
      <div class="form-group">
            <label for="formGroupExampleInput">Degree</label>
            <select class="custom-select" name="degree">
                <option selected value=" " disabled></option>
                <option value="Associate">Associate</option>
                <option value="Bachelor">Bachelor's</option>
                <option value="Master">Master's</option>
                <option value="Doctorate">Doctrate</option>
            </select>
        </div>
      <div class="form-group">
            <label for="formGroupExampleInput">Course</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="course">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">School</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="school">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Location</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="sAddress">
        </div>
        <div class="form-group">
            <label >Started (month and year):</label>
            <input type="month" class="form-control"  name="syStart">
        </div>
        <div class="form-group">
            <label >Graduated (month and year):</label>
            <input type="month" class="form-control"  name="syEnd">
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="addEdu" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal" id="work" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredLabel">Add Work Experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="main.php" method="POST">
          <div class="form-group">
            <label for="formGroupExampleInput">Job Title</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="title">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Company</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="company">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Location</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="wAddress">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Salary Range (Monthly)</label>
            <select class="custom-select" name="salary">
            <option selected>Open this select menu</option>
            <option value="Not to mention">Not to mention</option>
            <option value="P15,000 - P30,000">P15,000 - P30,000</option>
            <option value="P31,000 - P45,000">P31,000 - P45,000</option>
            <option value="P46,000 - P60,000">P46,000 - P50,000</option>
            <option value="P61,000 - P75,000">P61,000 - P75,000</option>
            <option value="P76,000 - P90,000">P76,000 - P90,000</option>
            <option value="P96,000 - above">P96,000 - above</option>
            </select>
        </div>
        
        <div class="form-group">
            <label >Started (month and year):</label>
            <input type="month" class="form-control"  name="wStart">
        </div>
        <div class="form-group">
            <label >Ended (month and year):</label>
            <input type="month" class="form-control"  name="wEnd" value="Present">
            <small>Leave it blank if you are currently working.</small>
        </div>
        <div class="form-group">
            <label >Job Description:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="wDes" required></textarea>
        </div>
        
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="addWork" class="btn btn-primary">Add</button>               
        </form1>  
    </div>
      </div>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>var inputLabel = $('#inputLabel');
var onOptionChange = function() {
  if (this.value == 'other') {
    inputLabel.fadeIn(100);
  } else {
    inputLabel.fadeOut(100);
  }
};
$('#status').on('change', onOptionChange);
</script>
<?php include('Includes/footer.php')?>

<?php

