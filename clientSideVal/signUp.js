function validateForm() {
    var errorStr= "";

    var username= document.getElementById("username").value;
    var password= document.getElementById("password").value;
    var illegalChars= new RegExp("/^[a-zA-Z-' ]*$/");
    
    if(username.length < 5 || illegalChars.test(username)) {
        errorStr= "Το username πρέπει να είναι πάνω απο 5 χαρακτήρες!\n";
        console.log("Works1");
    }

    if(password.length < 8 || illegalChars.test(password)) {
        errorStr+= "Ο κωδικός πρέπει να είναι πάνω απο 8 χαρακτήρες!\n";
        console.log("Works2");
    }

    if(errorStr != "") {
        alert(errorStr);
        return false;
    }

    return true;
}