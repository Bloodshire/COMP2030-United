function show(){
    if(document.getElementById("studentIn").checked){
        document.getElementById("learnerInput").style.display = show;
    }else if(document.getElementById("instructorIn").checked){
        document.getElementById("instructorInput").style.display = show;
    }else if(document.getElementById("qsdIn").checked){
        document.getElementById("qsdInput").style.display = show;
    }
}