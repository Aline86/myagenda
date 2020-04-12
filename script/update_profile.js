    var visible=()=>{
        var oeil1=visible2("pass1", "oeil1")
        
    }

    var visible2=(password, oeil)=>{
        var password=document.getElementById(password)
        var oeil=document.getElementById(oeil)
        if(password.type==="password"){
            password.type="text"
            oeil.innerHTML="<i class='fas fa-eye-slash'></i>"
        return true
        }else{
            password.type="password"
            oeil.innerHTML='<i class="fas fa-eye"></i>'
            return true
    }
    }

    var vide=(idInput, circleInput, messageInput)=>{
        var resultvide=document.getElementById(idInput).value
        var messagevide=document.getElementById(messageInput)
        var circle=document.getElementById(circleInput)
    
        if(resultvide==""){
            messagevide.innerHTML="Vous n'avez pas rempli le champ";
            messagevide.style.color="red"
            circle.style.color="red"
        
        }else{
            messagevide.innerHTML="Ce champs sera soumis à vérification";
            messagevide.style.color="green"
            circle.style.color="green"
        
        }
    }


    var pass=(passInput, longueur, circle)=>{
        var inputpass=document.getElementById(passInput).value
        var longueur=document.getElementById(longueur)
        var circle=document.getElementById(circle)
        if(inputpass.length<7 || inputpass.length >=16){
            longueur.innerHTML="La longueur n'est pas respectée (7 à 16 caractères)"
            longueur.style.color="red"
            circle.style.color="red"
        }else{
            longueur.innerHTML="Le mot de passe possède la longueur correcte";
            longueur.style.color="green"
            circle.style.color="green"
        }
    }
    var traitement =()=>{   
        var error4=pass("pass1", "pass1result", "pass1circle")
        var error6=vide("login", "circlelogin", "loginmessage")
        var error7=vide("pseudo", "pseudocircle", "pseudomessage")
        var error10=visible("pass1", "oeil1")

        if( error4 || error6 || error7 || error10){
            return false
        }else{
            return true
        }

    }



