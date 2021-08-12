
<?php 
include('auth.php');
include('includes/adminHeader.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
           
            <!-- <?php 
     
            if(isset($_SESSION['status'])){
                echo "<h5 class='alert-success'>".$_SESSION['status']."</h5> ";
                unset($_SESSION['status']);
            }
            ?> -->

            <div class="card">
                <div class="card-header">
                    <h4>User Management</h4>
                    <a href="addContact.php" class="btn btn-primary float-end">Add Admin</a>
                </div>
                <div class="card-body">

                    <table class="table table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Display</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Access Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                               <?php 
                               include('src/firebasePHP.php');
                               $users = $auth->listUsers($defaultMaxResults = 1000, $defaultBatchSize = 1000);
                                $i=1;
        
                               foreach ($users as $user) {
                                  ?>

                                  <tr>
                                    <td><?=$i++;?></td>
                                    <td><?=$user->displayName;?></td>
                                    <td><?=$user->phoneNumber;?></td>
                                    <td><?=$user->email;?></td>

                                    <td>
                                        <?php 
                                            $claims = $auth->getUser($user->uid)->customClaims;
                                            if(isset($claims['admin']) == true){
                                                echo "Admin";
                                            }
                                            elseif(isset($claims['superadmin']) == true){
                                                echo "Super Admin";
                                            }
                                            elseif(isset($claims['alumni']) == true){
                                                echo "Alumni";
                                            }
                                            elseif(isset($claims['employer']) == true){
                                                echo "Employer";
                                            }
                                            elseif($claims == null){
                                               echo "None";
                                            }

                                        ?>
                                    </td>

                                    <td>
                                        <?php 
                                            if($user->disabled){
                                                echo "Disabled";
                                            }
                                            else{
                                                echo "Enable";
                                            }
                                        ?>
                                    </td>



                                    <td><a href="editUsers.php?id=<?=$user->uid?>" class="btn btn-primary">Edit</a></td>
                                    <td><form action="main.php" method="POST"><button name="deleteUser" value="<?=$user->uid?>" class="btn btn-danger">Delete</button></form></td>
                                  </tr>

                                  <?php
                               }
                               
                              
                               
                               ?> 
                               
                               
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
  
</div>


<?php include("includes/footer.php") ?>