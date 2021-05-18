function validateForm() {

    var hotelName= document.getElementById("hotelName").value;
    var district= document.getElementById("district").value;
    var address= document.getElementById("address").value;
    var phone= document.getElementById("phone").value;
    var rooms= document.getElementById("rooms").value;
    var longitude= document.getElementById("longitude").value;
    var latitude= document.getElementById("latitude").value;
    var stars= document.getElementById("stars").value;
    var hasGym= document.getElementById("hasGym").value;
    var hasPool= document.getElementById("hasPool").value;
    var hasCinema= document.getElementById("hasCinema").value;
    var pictures= document.getElementById("pictures").value;

    var errorStr= "";

    stars= parseInt(stars);
    rooms= parseInt(rooms);
    longitude= parseFloat(longitude);
    latitude= parseFloat(latitude);

    var illegalName= new RegExp("^[a-zA-Z]$");
    var illegalAddress= new RegExp("^[a-zA-Z0-9]*$");
    var illegallLat= new RegExp('^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,7})?))$');
    var illegallLot= new RegExp('^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,7})?))$');
    var illegalStars= new RegExp("[1-5] {1}");
    var illegalPhone= new RegExp("^[0-9]* {1,20}");

    if(hotelName.length < 3 || illegalName.test(hotelName)) {
        errorStr+= "Το όνομα του ξενοδοχείου πρέπει να μην περιέχει ειδικούς χαρακτήρες\n";
    }

    if(district == "") {
        errorStr+= "Παρακαλώ συμπληρώστε σωστά τον νομό!\n";
    }

    if(address.length < 3 || illegalAddress.test(address)) {
        errorStr+= "Λάθος στοιχεία διεύθυνσης!\n";
    }

    if(phone.length< 3 || illegalPhone.test(phone)) {
        errorStr+= "Μη επιτρεπτός αριθμός τηλεφώνου!\n";
    }

    if((rooms <0 || rooms > 999)) {
        errorStr+= "Παρακαλώ εισάγεται αριθμητικά στοιχεία μεταξύ 1-999!\n";
    }
    
    if(illegallLot.test(longitude) || longitude== "") {
        errorStr+= "Παρακαλώ εισάγεται αριθμητικά στοιχεία με ακρίβεια 7 δεκαδικών\n";

    }

    if(illegallLat.test(latitude) || latitude== "") {
        errorStr+= "Παρακαλώ εισάγεται αριθμητικά στοιχεία με ακρίβεια 7 δεκαδικών\n";
    }

    if(illegalStars.test(stars) || stars== "") {
        errorStr+= "Μη επιτρεπτός αριθμός αστεριών!\n";
    }

    if(hasGym!= 0 && hasGym!= 1) {
        errorStr+= "Επέλεξε αν το ξενοδοχείο εχει γυμναστήριο!\n";
    }

    if(hasPool!= 0 && hasPool!= 1) {
        errorStr+= "Επέλεξε αν το ξενοδοχείο εχει πισίνα!\n";
    }

    if(hasCinema!= 0 && hasCinema!= 1) {
        errorStr+= "Επέλεξε αν το ξενοδοχείο εχει σινεμά!\n";
    }

    if(pictures== null) {
        errorStr+= "Παρακαλώ προσθέστε φωτογραφίες!\n";
    }

    if(errorStr != "") {
        alert(errorStr);
        return false;
    }
    console.log("works");
    return true;
}