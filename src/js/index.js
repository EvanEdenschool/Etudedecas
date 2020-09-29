


// Page d'inscription
function validform() {

    var b = document.forms["my-form"]["email"].value;
    var c = document.forms["my-form"]["prenom"].value;
    var d = document.forms["my-form"]["nom"].value;
    var e = document.forms["my-form"]["adresse"].value;
    var f = document.forms["my-form"]["password"].value;

    // on verifie si les champs nécéssaire ne sont pas nul
    if (b==null || b=="")
    {
        alert("Entrez votre email");
        return false;
    }else if (c==null || c=="")
    {
        alert("Entrez votre Prenom");
        return false;
    }else if (d==null || d=="")
    {
        alert("Entrez votre Nom");
        return false;
    }else if (e==null || e=="")
    {
        alert("Entrez votre Adresse");
        return false;
    }else if (f==null || f=="")
    {
        alert("Entrez votre Mot de passe");
        return false;
    }

}

//page de connexion
function validCnx() {
    var a = document.forms["login-form"]["email"].value;
    var b = document.forms["login-form"]["password"].value;
    // on verifie si les champs nécéssaire ne sont pas nul
    if (a==null || a=="")
    {
        alert("Entrez votre email");
        return false;
    }else if (b==null || b=="")
    {
        alert("Entrez votre mot de passe");
        return false;
    }
}
