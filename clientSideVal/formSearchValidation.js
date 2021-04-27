function validateForm() {
        var errorStr= "";
    
        var town= document.getElementById("hotel-name").value;
        var people= document.getElementById("persons").value;
        var date= document.getElementById("date").value;
        var illegalDate= new RegExp("/^\d{2}[./-]\d{2}[./-]\d{4}$/");
        var illegalNumber= new RegExp("[\d]");
        var illegalTown= new RegExp("^[a-zA-Z]+$");

        if(town.length < 2 || !illegalTown.test(town)) {
            errorStr+= "O Προορισμός πρέπει να είναι πάνω απο 2 λέξεις ή" +
                       "δεν πρέπει να περιέχει αριθμούς!\n";
        }
    
        if(people.length  < 0 || illegalNumber.test(people)) {
            errorStr+= "Λάθος αριθμός ατόμων!\n";
        }
    
        if(illegalDate.test(date)) {
            errorStr+= "Λάθος ημερομηνία!\n";
        }
    
        if(errorStr != "") {
            alert(errorStr);
            return false;
        }
    
    
    
        return true;
}
