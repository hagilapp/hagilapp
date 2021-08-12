


<?php
include('auth.php');
include('src/firebasePHP.php');
include('includes/header.php');?>



<div class="container">
<div class="row justify-content-center">
    <div class="col-md-6">
        <?php 

        if(isset($_SESSION['status'])){
            echo "<h5 class='alert-success'>".$_SESSION['status']."</h5> ";
            unset($_SESSION['status']);
        }
        ?>
        <div class="card">
            <div class="card-header">
                <h4>Edit User</h4>
                <a href="userlist.php" class="btn btn-danger float-end">Back</a>
            </div>
            <div class="card-body"> 
                    <form action="main.php" method="POST">
                    <?php 
                    include('src/firebasePHP.php');

                    if(isset($_GET['id'])){
                        $uid = $_GET['id'];
                    try {
                        
                        $user = $auth->getUserByEmail($uid);
                        ?>

                        <input type="hidden" name="userID" value="<?=$uid;?>">
                            <div class="form-group mb-3">
                        <label for="">Full Name</label>
                        <input type="text" name="display_Name"  value="<?=$user->displayName;?>" >
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Mobile Number</label>
                            <input type="text" name="phone" value="<?=$user->phoneNumber;?>"   >
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" name="updateUsers" class="btn btn-primary">Submit</button>
                        </div>

                        <?php 
                    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                        echo $e->getMessage();
                    }
                    }

                    
                    ?>
                    </form>

                     
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
            <h1>Enable/Disable</h1>
            </div>
            <div class="card-body">
                <form action="main.php" method="POST">
                    
                    <?php
                    if(isset($_GET['id'])){
                        $uid = $_GET['id'];
                        ?>

                    <input type="hidden" value="<?=$_GET['id']; ?>"  name="enableDis">
                    <div class="input-group mb-3">
                        <select class="form-control" name="select_enable" id="" required>
                            <option value="">Select</option>
                            <option value="enable">Enable</option>
                            <option value="disable">Disable</option>
                        </select>
                        <button type="submit" name="enable_user" class="input-text-group btn text-white bg-primary" >Submit</button>
                    </div>

                    <?php
                        try {
                            $user = $auth->getUser($uid);
                        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                            echo $e->getMessage();
                        }

                    }
                    else{
                        echo "No User Id Found";
                    }
                    ?>

                        
                </form>
            </div>

        </div>
    </div>

    <div class="col-md-12"><hr>
        
    </div>
    <div class="col-md-6">
        <div class="card mt-4">
            <div class="card-header">
            </div>
            <div class="card-body">

            <?php 
            if(isset($_GET['id'])){
                $uid = $_GET['id'];
                try {
                    $user = $auth->getUser($uid);
                    ?>
                    <form action="main.php" method="POST">
                    <input type="hidden" name="changeUPass" value="<?=$uid;?>">
                    <div class="form-group mb-3">
                        <label for="">New Password</label>
                        <input type="text" class="form-control" name="newPass">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Re-Password</label>
                        <input type="text" class="form-control" name="rePass">
                    </div>
                    <button type="submit" class="btn bg-primary" name="changePass">Submit</button>
                </form>
                    <?php

                } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                    echo $e->getMessage();
                }
            }
            else{
                echo "No ID Found";
            }
            ?>
               
            </div>
        
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
            <h4>Custom User</h4>
            </div>
            <div class="card-body">
                <form action="main.php" method="POST">

                <?php 
                    if(isset($_GET['id'])){

                        $uid = $_GET['id'];

                        ?>

                    <input type="hidden" name="IDuserClaims" value="<?=$uid;?>">
                        <div class="form-group mb-3">
                        <select class="form-control" name="roleAs" id="">
                            <option value="">Roles</option>
                            <option value="admin">Admin</option>
                            <option value="superadmin">Super Admin</option>
                            <option value="noRole">Remove Role</option>
                        </select>
                        </div>
                        <label for="">Current Role</label>
                        <h4>
                        <?php
                        $claims = $auth->getUser($uid)->customClaims;
                        if(isset($claims['admin']) == true){
                            echo "Role: Admin";
                        }
                        elseif(isset($claims['superadmin']) == true){
                            echo "Role: Super Admin";
                        }
                        elseif($claims == null){
                            echo "Role: None";
                        }
                        ?>
                        </h4>
                    <div class="form-group mb-3">
                        <button type="submit" name="userClaims" class="btn btn-primary">Submit</button>
                    </div>

                        <?php
                    }
                    else{

                    }
                ?>
                    
                </form>
            </div>
        </div>
    
    </div>


</div>  
</div>


<?php include("includes/footer.php") ?>
           