<?php  
include('auth.php');
include('Includes/header.php');

$uid = $_SESSION['verified_user_id']; 
$user = $auth->getUser($uid);
?>

<?php include('src/firebasePHP.php'); $getData = $database->getReference('AUserList')->getChild($uid)->getValue();?>



<div class="container">
    
    <div class="row">

         

        <form action="main.php" method="POST" enctype="multipart/form-data" class="row">
            <div class="col-md-4">
                <div class="card m-1">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="input-group-append">
                                    <?php 
                                        if($user->photoUrl != NULL){
                                            ?>
                                            <!-- <img src="<?=$user->photoUrl?>" alt="Admin" class="rounded-circle " width="180"> -->
                                            <img class="rounded-circle" src="<?=$user->photoUrl?>" alt="Circle image" width="200" >
                                            
                                            
                                            <?php
                                        }
                                        else{
                                            ?>
                                           
                                            <img class="rounded-circle" src="https://ps.w.org/simple-user-avatar/assets/icon-128x128.png?rev=2413146" alt="Circle image" width="200" >
                                            
                                            
                                            <?php
                                        }

                                    ?>
                                    
                            </div>

                            <div class="row">
                                <h6 class="mt-1">Upload Photo</h6>
                                <input type="file" name="pic" class="form-control" value="<?=$user->photoUrl?>">
                                <div class="form-group">
                                    <button class="btn btn-primary mt-1 px-sm-4" type="submit" name="setPIC">Save Photo</button>
                                </div>
                            </div>
                                
                            <div class="row mt-3">
                                <h3><?=$user->displayName?></h3>
                                <h6>Name</h6>
                            </div>
                            <div class="row mt-3"><h5 class="text-center">Background Summary</h5>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="aBG" value="<?=$getData['background']?>" ><?=$getData['background']?></textarea>
                            </div>


                        </div>
                    </div>
                </div>                
            </div>

            <div class="col-md-8 mt-1">
                <div class="card row">
                    <div class="card-body">
                        <h3>Personal Information</h3><hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">First Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input class="form-control" type="text" name="first_Name" value="<?=$getData['firstname']?>">
                            </div>
                        </div><hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Middle Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input class="form-control" type="text" name="middle_Name" value="<?=$getData['middlename']?> ">
                            </div>
                        </div><hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Last Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input class="form-control" type="text" name="last_Name" value="<?=$getData['lastname']?>">
                            </div>
                        </div><hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Extension Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input class="form-control" type="text" name="ext_Name" value="<?=$getData['extname']?>" >
                            </div>
                        </div><hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Age</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input class="form-control" type="text" name="aAge" value="<?=$getData['age']?>">
                            </div>
                        </div><hr>
                                        
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Birthday</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input class="form-control"  type="date" name="aBirthday" value="<?=$getData['birthday']?>" >
                            </div>
                        </div><hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nationality</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <!-- <input class="form-control" type="text" name="nationality" required > -->
                                <div class="form-group">
                                    <input type="text" name="nationality" class="form-control" id="input" value="<?=$getData['nationality']?>">
                                </label>
                                </div>
                            </div>
                        </div><hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input class="form-control" type="text" name="email" value="<?=$user->email;?>" >
                            </div>
                        </div><hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input class="form-control" type="text" name="phone" value="<?=$user->phoneNumber;?>" >
                            </div>
                        </div><hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Location</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input class="form-control" type="text" name="aLocation" value="<?=$getData['location']?>">
                            </div>
                        </div><hr>


                    </div>
                </div>  
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary"  name="setUProfile">Add</button>
            </div>
        </form>
    </div>
    <?php
    ?>
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

