<?php include('includes/header.php' ) ?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Contacts</h4>
                    <a href="index.php" class="btn btn-danger float-end">Back</a>
                </div>
                <div class="card-body">
                    <form action="main.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="first_name" id="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Last Name</label>
                            <input type="text" name="last_name" id="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email Address</label>
                            <input type="text" name="email" id="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Mobile Number</label>
                            <input type="text" name="mobile" id="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="saveContact" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
</div>


<?php include("includes/footer.php") ?>