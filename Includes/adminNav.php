<nav class="navbar navbar-b navbar-trans navbar-expand-md" id="mainNav">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <span>
          <img style="height: 50px; width: 90px;" src="HAGILAPP.png" alt="">
          <small>
            <strong>
              H A G I L A p p
            </strong>
          </small>
        </span>
      </a>
    
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
          
      <ul class="navbar-nav">

          <?php if(!isset($_SESSION['verified_user_id'])) :  ?>
            <li class="nav-item">
              <a class="nav-link js-scroll" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll " data-toggle="dropdown"  >Sign In</a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <a class="dropdown-item" href="login.php">as Alumni</a>
              <a class="dropdown-item" href="EmployerRegistration.php">as Alumni Seeker</a>
            </div>
        
            </li>
            <li class="nav-item">
              <strong class="text-light ml-1 mr-1">Register as</strong>
              <a type="button" class="btn btn-outline-light ml-2 mr-1" href="register.php">Alumni</a>
              <strong class="text-light ml-1 mr-1">or</strong>
              <button type="button" class="btn btn-outline-light ml-1 mr-2">Alumni Seeker</button>
            </li>
            <form class="d-flex">
          <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-danger" type="submit">Search</button> -->

          <?php else :  ?>
            <li class="nav-item">
            <div class="dropdown open">
            <?php 
            $uid = $_SESSION['verified_user_id']; 
            $user = $auth->getUser($uid);
            $user->displayName;
            ?>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?=$user->displayName;?>
                </button>
                <div class="dropdown-menu">
                  <!-- <a class="dropdown-item" href="EmployerMainProfile.php">My Profile</a> -->
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="ahome.php">Dashboard</a>
                  <a class="dropdown-item" href="userlist.php">User Management</a>
                  <a class="dropdown-item" href="AdminJobHiring.php">Hiring Management</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalScrollable">Settings</a>
                  <a class="dropdown-item" href="logoutCon.php">Logout</a>
                </div>
                      <!-- Modal Settings -->
                                          <div class="modal" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalCenteredLabel">Settings</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="list-group">
                                                  <a href="EmployerEditInfo.php" class="list-group-item list-group-item-action list-group-item-success text-center">Edit Profile</a>
                                                  <a href="EmployerSecurity.php" class="list-group-item list-group-item-action list-group-item-success text-center">Security</a>
                                                </div>
                                                </div>
                                                <!-- <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="button" class="btn btn-primary">Save changes</button>
                                                </div> -->
                                              </div>
                                            </div>
                                          </div>
                    <!-- End Modal Settings -->
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="logoutCon.php">Logout</a>
            </li> -->
          <li class="nav-item">
            <div class="input-group">
              
              <input type="text" class="form-control" placeholder="Search Here" aria-label="Search for..." name="id">
                <span class="input-group-btn">
                  <button class="btn btn-secondary btn-search" type="submit" ><span class="ion-android-search"></span></button>
                </span>
            
              </div>
          </li>
            
            <!-- <li class="nav-item">
            <a class="nav-link" href="userlist.php">User Lists</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="logoutCon.php">Logout</a>
            </li>
             -->

          <?php endif; ?>

          <li class="nav-item">
        
            </li>

          
          

          </ul>
         
          </form>
      </div>
    </div>
  </nav>
  


  



