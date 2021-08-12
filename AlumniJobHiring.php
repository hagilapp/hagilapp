

<?php  
include('auth.php');
include('Includes/header.php');

$uid = $_SESSION['verified_user_id']; 
$user = $auth->getUser($uid);
?>

<?php include('src/firebasePHP.php'); $getData = $database->getReference('Hirings')->getChild($uid)->getValue();?>



<div class="container ">
    
    <div class="row justify-content-center">

                <div class="card col-8 mt-3">
                    <div class="card-body">
                        <h3>Job Hirings</h3><hr>

                        <div class="card">
                            <form action="main.php" method="POST">
                        <?php 
                                include('src/firebasePHP.php');
                                $getData = $database->getReference("Hirings")->getValue();

                                if($getData > 0){
                                    $i = 1;
                                    
                                    foreach($getData as $key => $row){
                                        ?>

                                        <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><?=$row['title']; ?></h5>
                                            <h6 class="">
                                            <strong><?=$row['company'];?></strong>
                                            </h6>
                                            <h6 class="card-text">
                                            <label for="">Salary (Monthly):</label>
                                            <?=$row['salary'];?>
                                            </h6>
                                            <h6 class="card-text">
                                            <label for="">Job Description:</label>
                                            <?=$row['description'];?>
                                            </h6>
                                            <h6 class="card-text">
                                            <label for=""></label>
                                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#responsibility">Job Responsibilities</button>
                                            <button type="button" class="btn btn-outline-info"data-toggle="modal" data-target="#qualification">Job Qualifications</button>
                                            <button type="button" class="btn btn-outline-danger"data-toggle="modal" data-target="#apply">Apply</button>
                                           
                                        </h6>
                                       
                                        </div>
                                        
                                    </form>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal" id="responsibility" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenteredLabel">Job Responsibility</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <?=$row['responsibility'];?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal" id="qualification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenteredLabel">Job Qualification</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <?=$row['qualification'];?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            
                                        </div>
                                        </div>
                                    </div>
                                    </div>


                                        <?php

                                    }

                                }
                                else{

                                    // echo "No Data";

                                }
                                
                                ?> 
                            
                            
                            
                        </div>
                    </div>
                    
                </div>     

                   
            </div>

    <?php
    ?>
</div>

 <!-- Modal -->
 <div class="modal" id="apply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenteredLabel">Job Responsibility</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <?=$row['responsibility'];?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

