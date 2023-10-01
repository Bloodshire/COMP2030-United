function show(){
    let learnerInput = document.getElementById("learnerInput");
    let instructorInput = document.getElementById("instructorInput");
    let QSDInput = document.getElementById("qsdInput");

    

    let userType = "";

    if(document.getElementById("studentIn").checked){
        instructorInput.style.display = "none";
        qsdInput.style.display = "none";
        learnerInput.style.display = "block";
    }else if(document.getElementById("instructorIn").checked){
        instructorInput.style.display = "block";
        qsdInput.style.display = "none";
        learnerInput.style.display = "none";
    }else if(document.getElementById("QSDIn").checked){
        instructorInput.style.display = "none";
        QSDInput.style.display = "block";
        learnerInput.style.display = "none";
    }
}