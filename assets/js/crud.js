function RegisterUser() {
    var email=document.getElementById('email').value;
    var password=document.getElementById('password').value;
    var age=document.getElementById('age').value;
    var fst=document.getElementById('firstname').value;
    var fmd=document.getElementById('middlename').value;
    var fls=document.getElementById('lastname').value;
    firebase.auth().createUserWithEmailAndPassword(email,password).then(function(){
     // alert('User Register successfully');
     var id=firebase.auth().currentUser.uid;
     firebase.database().ref('Users/'+id).set({
      Name:fst,
      UserAge:age
     });
 
 
 
    }).catch(function(error){
 
     var errorcode=error.code;
     var errormsg=error.message;
 
    });
   }
