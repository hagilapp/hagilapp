<?php 
include('auth.php');
include('includes/header.php')
?>



<main id="main">
    <div class="container mt-5">
        <div class="main-body">
        
              
              <!-- /Breadcrumb -->
        
              <div class="row gutters-sm mt-3">
                <div class="col-md-4   mb-3 ">
                  
                  <div class="card mt-3">
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
                        
                        <div class="mt-3">
                          <h4><?=$user->displayName;?></h4>
                          
                          <p class="text-muted font-size-sm"></p>
                          <?php 
                            include('src/firebasePHP.php');
                            $getData = $database->getReference('AUserList')->getChild($uid)->getValue();
                          ?>
                           


                            
                            <!-- <button class="btn btn-success">Follow</button>
                         <button class="btn btn-outline-success">Message</button>  -->
                          <div>
                              
                          
                          </div>
                        </div>
                      </div>
                      <div class="m-2"><h5 class="text-center">Background Summary</h5><hr>
                            
                    <p class="text-justify"> <?=$getData['background']?></p>
                    </div>
                      
                    </div>
                  </div>
                  

                </div>

                <div class="col-md-8 ">
                  <div class="card mb-3 mt-3">
                    <div class="card-body">
                        <h3>Personal Information</h3>
                      <hr>
                      
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Age</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?=$getData['age']?>
                        </div>
                      </div>
                      <hr>
                      
                       <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Birthday</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?=$getData['birthday']?>
                        </div>
                       
                      </div>
                      <hr>
                       
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Nationality</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?=$getData['nationality']?>
                        </div>
                       
                      </div>
                      <hr>
                      
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?=$user->email;?>
                        </div>
                      </div>
                      <hr>
                      
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?=$user->phoneNumber;?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?=$getData['location']?>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="card mb-3">
                  <div class="card-body">
                        <h3>Education Background</h3><hr>

                        <div class="card">
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
                                            
                                            <!-- <button type="submit" class="btn btn-danger" name="deleteEdu" value="<?=$key?>" ><i class="fa fa-times" aria-hidden="true"></i>DELETE</button> -->
                                        </div>
                                    </div>
                                        <?php

                                    }

                                }
                                else{

                                    // echo "No Data";

                                }
                                
                                ?> 
                            
                                <!-- <button type="button" class="btn btn-primary mt-4   " data-toggle="modal" data-target="#edu">Add</button> -->
                            
                        </div>
                    </div>
                  </div>

                  <div class="card mb-3">
                  <div class="card-body">
                        <h3>Work Experience</h3><hr>

                        <div class="card">
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
                                            
                                            <!-- <button type="submit" class="btn btn-danger" name="deleteWork" value="<?=$key?>" ><i class="fa fa-times" aria-hidden="true"></i>DELETE</button> -->
                                        </div>
                                    </div>
                                        <?php

                                    }

                                }
                                else{

                                    // echo "No Data";

                                }
                                
                                ?> 
                            
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#work">Add</button> -->
                            
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
              </div>
            </div>
    

  </main><!-- End #main -->


  <?php 

include('includes/footer.php')
?>
