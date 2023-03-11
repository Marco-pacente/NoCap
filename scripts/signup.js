function signupSubmit(){
    let isValid = true;
    let email = document.getElementById("email").value.trim();
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();
    let bday = document.getElementById("bday").value;
    let currDate = new Date();
    let today = currDate.getFullYear() + "-" + currDate.getMonth() + "-" + currDate.getDate();
    console.log(today);
    document.getElementById("error").innerHTML = "";
    if(email && username && password && bday){
        if(username.length < 4 || username.length > 20){
            document.getElementById("error").innerHTML += "l'username deve essere compreso tra 4 e 20 caratteri <br>";
            isValid = false;
        }
        if(password.length < 8){
            document.getElementById("error").innerHTML += "La password deve avere almeno 8 caratteri <br>";
            isValid = false;
        }
        if(bday < "1900-01-01"){
            document.getElementById("error").innerHTML += "la data di nascita non deve essere antecedente al 1900 <br>";
            isValid = false;
        }else if(bday >= today){
            document.getElementById("error").innerHTML += "la data di nascita non può essere successiva alla data odierna. Dai brother <br>";
            isValid = false;
        }
    }else{
        document.getElementById("error").innerHTML = "Tutti i campi sono obbligatori";
    }
    return isValid;
}