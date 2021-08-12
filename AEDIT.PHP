<div class="row">
                        <form action="main.php" method="POST" enctype="multipart/form-data">
                            <!--  -->
                            <div class="input-group">
                                <div class="input-group-append">
                                    <?php 
                                        if($user->photoUrl != NULL){
                                            ?>
                                            <div class="wrapper"><img class="img-circle w-10 image--cover square" src="<?=$user->photoUrl?>" alt="User Profile" ></div>
                                            
                                            <?php
                                        }
                                        else{
                                            echo "Update your profile photo";
                                        }

                                    ?>
                                    
                                </div>
                                
                                
                            </div>
                            <div class="col-md-6">
                            <label for="">Full Name</label>
                            <input class="form-control" type="text" name="display_Name"  value="<?=$user->displayName;?>" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Mobile Number</label>
                                <input class="form-control" type="text" name="phone" value="<?=$user->phoneNumber;?>" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input class="form-control" type="text" name="email" value="<?=$user->email;?>" >
                            </div>
                            
                            <div class="form-group mb-3">
                                <button class="btn btn-primary" type="submit" name="updateUProfile">Submit</button>
                            </div>
                            
                        </form>
                        </div>