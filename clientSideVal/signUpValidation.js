function validateForm() {
    var errorStr= "";

    var username= document.getElementById("username").value;
    var password= document.getElementById("password").value;
    var email= document.getElementById("email").value;

    var illegalEmail= new RegExp("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/");
    var illegalPassword= new RegExp("^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()])(?=\\S+$).{8, 20}$");
    var illegalChars= new RegExp("^[A-Za-z]\\w{5, 29}$");
    
    console.log(illegalChars.test(username));
    console.log(illegalPassword.test(password));
    console.log(illegalEmail.test(email));

    if(username.length < 5 || illegalChars.test(username)) {
        errorStr+= "Το username πρέπει να είναι πάνω απο 5 χαρακτήρες!\n";
    }

    if(password.length < 8 || illegalPassword.test(password)) {
        errorStr+= "Ο κωδικός πρέπει να είναι πάνω απο 8 χαρακτήρες!\n";
    }

    if(illegalEmail.test(email)) {
        errorStr+= "Άκυρο email!\n";
    }

    if(errorStr != "") {
        alert(errorStr);
        return false;
    }



    return true;
}