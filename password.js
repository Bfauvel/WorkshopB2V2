function surligne(champ, erreur)
{
    if (erreur)
    {
        champ.style.backgroundColor = "#fba";
        
    
}
    else
        champ.style.backgroundColor = "";
    document.getElementById("p5").style.color= 'black';
   
}

function verifPseudo(champ)
{
    if (champ.value.length < 1 || champ.value.length > 20)
    {
        surligne(champ, true);
        document.getElementById("p1").style.color= 'red';
        return false;
    } 
    else
    {
        surligne(champ, false);
        document.getElementById("p1").style.color= 'white';
        return true;
    }
}

function verifPassword(champ)
{
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[0-9])(?=.{7,})");
    if (!strongRegex.test(champ.value))
    {
        surligne(champ, true);
        document.getElementById("p3").style.color= 'red';
        return false;
    } else
    {
        surligne(champ, false);
        document.getElementById("p3").style.color= 'white';
        return true;
    }
}

function verifConfirmPassword(champ)
{
      var pw1 = document.getElementById("password1").value;
      var pw2 = document.getElementById("password2").value;

    if (pw1 != pw2)
    {
        surligne(champ, true);
         document.getElementById("p4").style.color= 'red';
        return false;
    } 
    else
        surligne(champ, false);
        document.getElementById("p4").style.color= 'white';
        return true;
}

function verifMail(champ)
{
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if (!regex.test(champ.value))
    {
        document.getElementById("p2").style.color= 'red';
        surligne(champ, true);
        return false;
    } 
    else
    {
        document.getElementById("p2").style.color= 'white';
        surligne(champ, false);
        return true;
    }
}

function verifForm(f)
{
    var pseudoOk = verifPseudo(f.pseudo);
    var mailOk = verifMail(f.email);
    var passwordOk = verifPassword(f.password);
    var confirmPasswordOk = verifConfirmPassword(f.password_confirmation);

    if (pseudoOk && mailOk && passwordOk && confirmPasswordOk)
    {
        alert("Vous êtes inscrit");
        return true;
    }
        else
    {
        alert("Veuillez remplir correctement tous les champs");
        return false;
    }
}