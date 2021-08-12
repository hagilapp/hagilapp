<?php  
include('auth.php');
include('includes/header.php'); ?>


<div class="container">
    <div class="row">
        <!-- <div class="col-md-12">
        <?php 
            
            if(isset($_SESSION['status'])){
                echo "<h5 class='alert-success'>".$_SESSION['status']."</h5> ";
                unset($_SESSION['status']);
            }
            ?>
            <h4>Home Page</h4>
            
        </div> -->
    </div>
</div>

<?php include('chart.php')?>

<?php

