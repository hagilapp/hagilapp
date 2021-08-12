<?php 
session_start();

include('src/firebasePHP.php');


if(isset($_SESSION['verified_user_id'])){

    if(isset($_SESSION['verified_admin'])){

        $uid = $_SESSION['verified_user_id']; 
        $idTokenString = $_SESSION['idTokenString']; 
    
            try {
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                 
                if(isset($claims['admin']) == true){
                    
                   
                    // echo "Working!";
                }
                else{
                    header('Location: logout.php');
                    exit(0);
                }
                
            } catch (InvalidToken $e) {
                // echo 'The token is invalid: '.$e->getMessage();
                $_SESSION['exstatus'] = "Session Expired!";
                    header('Location: logoutCon.php');
                    exit();
            } catch (\InvalidArgumentException $e) {
                echo 'The token could not be parsed: '.$e->getMessage();
                $_SESSION['exstatus'] = "Session Expired!";
                header('Location: logoutCon.php');
                exit();
            }

        
    }
    
    else{
        
            $_SESSION['status'] = "Access Denied!";
            header('Location: {$_SERVER["HTTP_REFERER"]}');
            exit();

    }

   


}
else{
    $_SESSION['status'] = "Login to Access this Page!";
    header('Location: login.php');
    exit();
}



?>
