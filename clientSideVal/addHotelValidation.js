function validateForm() {
    console.log("works");

    var hotelName= document.getElementById("hotel-name").value;
    var district= document.getElementById("district").value;
    var address= document.getElementById("address").value;
    var rooms= document.getElementById("rooms").value;
    var longitude= document.getElementById("longitude").value;
    var latitude= document.getElementById("latitude").value;
    var stars= document.getElementById("stars").value;
    var hasGym= document.getElementById("has-gym").value;
    var hasPool= document.getElementById("has-pool").value;
    var hasCinema= document.getElementById("has-cinema").value;
    var pictures= document.getElementById("pictures").value;

    var errorStr= "";

    longitude= parseFloat(longitude).toFixed(7);
    latitude= parseFloat(latitude).toFixed(7);
    stars= parseInt(stars);
    rooms= parseInt(rooms);
    var illegalName= new RegExp("^[a-zA-Z0-9]*$");
    var illegalRooms= new RegExp("^[1-9]{0, 3}");
    var illegallLat= new RegExp('[0-9]+("."[0-9]+)?');
    var illegalStars= new RegExp("[1-5] {1}");

    if(hotelName.length < 2 ||  illegalName.test(hotelName)) {
        errorStr+= "Το όνομα του ξενοδοχείου πρέπει να μην περιέχει ειδικούς χαρακτήρες\n";
    }

    if(district == null) {
        errorStr+= "Παρακαλώ συμπληρώστε σωστά τον νομό!\n";
    }

    if(address.length < 3 || illegalName.test(address)) {
        errorStr+= "Λάθος στοιχεία διεύθυνσης!\n";
    }

    if(illegalRooms.test(rooms) || rooms== null) {
        errorStr+= "Παρακαλώ εισάγεται αριθμητικά στοιχεία μεταξύ 1-999!\n";
    }
    
    if(illegallLat.test(longitude) || longitude== null) {
        errorStr+= "Παρακαλώ εισάγεται αριθμητικά στοιχεία με ακρίβεια 7 δεκαδικών\n";

    }

    if(illegallLat.test(latitude) || latitude== null) {
        errorStr+= "Παρακαλώ εισάγεται αριθμητικά στοιχεία με ακρίβεια 7 δεκαδικών\n";
    }

    if(illegalStars.test(stars) || starts== null) {
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