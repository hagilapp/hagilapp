
<?php 
include('auth.php');
include('includes/header.php')
 ?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
           
            <?php 
            
            if(isset($_SESSION['status'])){
                echo "<h5 class='alert-success'>".$_SESSION['status']."</h5> ";
                unset($_SESSION['status']);
            }
            ?>

            <div class="card">
                <div class="card-header">
                    <h4>Sample Web</h4>
                    <!-- <a href="addContact.php" class="btn btn-primary float-end">Add Contacts</a> -->
                </div>
                <div class="card-body">

                    
                            
                                <?php 
                                include('src/firebasePHP.php');
                                $getData = $database->getReference('posts')->getValue();

                                if($getData > 0){
                                    $i = 0;
                                    foreach($getData as $key => $row){
                                        ?>

                                    
                                            <!-- <?=$key; ?> -->


                                            <div class="card" >
                                                <img class="card-img-top" src="..." alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?=$row['fname']; ?> <?=$row['lname']; ?></h5>
                                                    <p class="card-text"><?=$row['email']; ?></p>
                                                    <p class="card-text"><?=$row['mobile']; ?></p>
                                                    <a href="editContact.php?id=<?=$key;?>" class="btn btn-primary">Check Profile</a>
                                                    <a href="deleteContact.php" class="btn btn-danger btn-small">Message</a>
                                                </div>
                                                </div>
                                    
                                            
                            

                                        <?php

                                    }

                                }
                                else{

                                }
                                
                                ?>  
                               
                    
                </div>
            </div>
        </div>
    </div>
  
</div>


<?php include("includes/footer.php") ?>