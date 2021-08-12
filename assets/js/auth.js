
 
        var asignupbtn = document.getElementById("asignupbtn")
        var esignupbtn = document.getElementById("esignupbtn")
        var emailsignup = document.getElementById("useremail")
        var passswordsignup = document.getElementById("userpass")



         //================Signup With Email and Password for Alumni==========================
         asignupbtn.onclick = function () {
            asignupbtn.disabled = true;
            asignupbtn.textContent = "Registering Your Account! Please Wait";
            firebase.auth().createUserWithEmailAndPassword(emailsignup.value, passswordsignup.value).then(function (response) {
                sendingVerifyEmail(asignupbtn);
                console.log(response);
                console.log("Sign Up Successfully");
            })
                .catch(function (error) {
                    asignupbtn.disabled = false;
                    asignupbtn.textContent = "Sign Up";
                    console.log(error);
                })


        }


        //================Signup With Email and Password for Employer/Alumni Seeker==========================
        esignupbtn.onclick = function () {
            esignupbtn.disabled = true;
            esignupbtn.textContent = "Registering Your Account! Please Wait";
            firebase.auth().createUserWithEmailAndPassword(emailsignup.value, passswordsignup.value).then(function (response) {
                sendingVerifyEmail(esignupbtn);
                console.log(response);
                console.log("Sign Up Successfully");
            })
                .catch(function (error) {
                    esignupbtn.disabled = false;
                    esignupbtn.textContent = "Sign Up";
                    console.log(error);
                })


        }

        function sendingVerifyEmail(button) {
            firebase.auth().currentUser.sendEmailVerification().then(function (response) {
                esignupbtn.disabled = false;
                asignupbtn.disabled = false;
                

                console.log(response);
            })
                .catch(function (error) {
                    esignupbtn.disabled = false;
                    asignupbtn.disabled = false;
                    

                    console.log(error);
                })
        }
        //================End Signup With Email and Password======================

        //==========================Sign in With Email and Password============================

        var loginemail = document.getElementById("inputEmail");
        var loginpassword = document.getElementById("inputPassword");
        var loginbtn = document.getElementById("loginbtn");


        loginbtn.onclick = function () {
            loginbtn.disabled = true;
            loginbtn.textContent = "Logging In Please Wait.."
            firebase.auth().signInWithEmailAndPassword(loginemail.value, loginpassword.value).then(function (response) {
                console.log(response);
                console.log("Sign In Success!")
                loginbtn.disabled = false;
                loginbtn.textContent = "Sign In"
                var userobj = response.user;
                var token = userobj.xa;
                var provider = "email";
                var email = loginemail.value;
                if (token != null && token != undefined && token != "") {
                    sendDatatoServerPhp(email, provider, token, email);
                }
            })
                .catch(function (error) {
                    console.log(error);
                    loginbtn.disabled = false;
                    loginbtn.textContent = "Sign In"

                })
        }
        //======================End Sign In With Email and Password========================


        
        ///=================Login With google===========================
        var googleLogin = document.getElementById("googleLogin");

        googleLogin.onclick = function () {
            var provider = new firebase.auth.GoogleAuthProvider();

            firebase.auth().signInWithPopup(provider).then(function (response) {
                var userobj = response.user;
                var token = userobj.xa;
                var provider = "google";
                var email = userobj.email;
                if (token != null && token != undefined && token != "") {
                    sendDatatoServerPhp(email, provider, token, userobj.displayName);
                }

                console.log(response);
            })
                .catch(function (error) {
                    console.log(error);
                })


        }
        //=======================End Login With Google==================
        
        //======================Login With Facebook==========================
        var facebooklogin = document.getElementById("facebooklogin");
        facebooklogin.onclick = function () {
            var provider = new firebase.auth.FacebookAuthProvider();

            firebase.auth().signInWithPopup(provider).then(function (response) {
                var userobj = response.user;
                var token = userobj.xa;
                var provider = "facebook";
                var email = userobj.email;
                if (token != null && token != undefined && token != "") {
                    sendDatatoServerPhp(email, provider, token, userobj.displayName);
                }

                console.log(response);
            })
                .catch(function (error) {
                    console.log(error);
                })


        }
   //======================End Login With Facebook==========================
