<?php 
session_start();
include('src/firebasePHP.php');

if(isset($_POST['Elogin'])){
    $email = $_POST['email'];
    $clearTextPassword = $_POST['password'];
    

    try {
        
        $user = $auth->getUserByEmail("$email");
        

            try{
             $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
                $idTokenString = $signInResult->idToken();

             try {
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                $uid = $verifiedIdToken->claims()->get('sub');

               
                if(isset($claims['admin']) == true){
                    $_SESSION['verified_admin'] = true;
                    $_SESSION['verified_user_id'] = $uid;
                    $_SESSION['idTokenString'] = $idTokenString;
                }
                elseif(isset($claims['superadmin']) == true){
                    $_SESSION['verified_superadmin'] = $uid;
                    $_SESSION['verified_user_id'] = $uid;
                    $_SESSION['idTokenString'] = $idTokenString;
                }
                elseif(isset($claims['employer']) == true){
                    $_SESSION['verified_employer'] = $uid;
                    $_SESSION['verified_user_id'] = $uid;
                    $_SESSION['idTokenString'] = $idTokenString;
                }
                elseif($claims == null){
                    $_SESSION['verified_user_id'] = $uid;
                    $_SESSION['idTokenString'] = $idTokenString;
                }

                
          
               
                $_SESSION['status'] = "Success!";
                header('Location: userlist.php');
     
                
            

                exit();

            } catch (InvalidToken $e) {
                echo 'The token is invalid: '.$e->getMessage();
            } catch (\InvalidArgumentException $e) {
                echo 'The token could not be parsed: '.$e->getMessage();
            }

            }
            catch(Exception $e){
                $_SESSION['status'] = "Wrong Credentials";
                header('Location: login.php');
                exit();
            }
        
        
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        echo $e->getMessage();
    }

}
else{
    $_SESSION['status'] = "not allowed";
    header('Location: login.php');
    exit();
}

?>