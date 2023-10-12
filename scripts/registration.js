function show(){
    let learnerInput = document.getElementById("learnerInput");
    let instructorInput = document.getElementById("instructorInput");
    let QSDInput = document.getElementById("qsdInput");

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

function passStr(){
    let password = document.getElementById("password").value;
    let strength = document.getElementById("strengthImg");

    //Length check
    if(password.length < 12){
        strength.src = "../images/no-pass.png";
    }else{
        strength.src = "../images/bad-pass.png";
        let caps = 0;
        let lows = 0
        for(let i=0; i < password.length; i++){

            if(isNaN(password.charAt(i))){
                if(password.charAt(i) == password.charAt(i).toUpperCase()){
                    caps++;
                }
                if(password.charAt(i) == password.charAt(i).toLowerCase()){
                    lows++;
                }
            }

        }
        if(caps > 0 && lows > 0){
            strength.src = "../images/meh-pass.png";
            let nums = 0;
            for(let i=0; i < password.length; i++){

                if(!(isNaN(password.charAt(i)))){
                    nums++;
                }
            }
            if(nums > 0){
                strength.src = "../images/better-pass.png";

                let special = "!\"#$%&\'()*+,-./:;<=>?@[\]^_`{|}~"
                let specials = 0;

                for(let i=0; i < password.length; i++){

                    for(let j = 0; j < special.length; j++){
                        
                        if(password.charAt(i) == special.charAt(j)){
                            specials++;
                            console.log(password.charAt(i) + " IS A SPECIAL CHARACTER!");
                        }

                    }
                }

                if(specials > 0){
                    strength.src = "../images/good-pass.png";
                }

            }
        }
    }
}

function passVal(){
    let password = document.getElementById("password").value;
    let confirm = document.getElementById("passwordConfirm").value;

    if(confirm != password){
        document.getElementById("passwordConfirm").style.border = "2px solid red";
        document.getElementById("pWarning").innerHTML = "Password does not match.";
    }else if(confirm == password){
        document.getElementById("passwordConfirm").style.border = "1px solid gray";
        document.getElementById("pWarning").innerHTML = "";
    }
}

function emailVal(){
    let email = document.getElementById("email").value;
    let emailConfirm = document.getElementById("emailConfirm").value;

    if(email != emailConfirm){
        document.getElementById("emailConfirm").style.border = "2px solid red";
        document.getElementById("eWarning").innerHTML = "Email does not match.";
    }else if(email == emailConfirm){
        document.getElementById("emailConfirm").style.border = "1px solid gray";
        document.getElementById("eWarning").innerHTML = "";
    }
}