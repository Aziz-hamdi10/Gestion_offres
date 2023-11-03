function submit_cv(){

    var nom =document.form.nom.value;   
    var prenom =document.form.prenom.value;
    var age=document.form.age.value;
    let email=document.getElementById('email').value
    //listes de choix
    let select = document.getElementById('competences');
    listeComp = "";
    for (let i=0; i<select.length; i++) 
    {
        if (select[i].selected) 
            listeComp += select[i].value + ', ';
    }
    //controles de saisi
        
    let regExNom=/^[a-zA-Z\s]+$/;
    let regExEmail= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ;
    let myError=document.getElementById('erreur1');
    myError.style.color='red';


    // controle du nom
    if (nom.trim()=='')
    {	
        myError.innerHTML='Le champ nom est requis!';
        e.preventDefault();
    }
    else if(regExNom.test(nom)==false){

        myError.innerHTML="Le champ nom doit être composé de lettres ou d'espaces!";
        e.preventDefault();
    }
    // controle du prenom
    if (prenom.trim()=='')
    {	
        myError.innerHTML='Le champ prenom est requis!';
        e.preventDefault();
    }
    else if(regExNom.test(prenom)==false){

        myError.innerHTML="Le champ prenom doit être composé de lettres ou d'espaces!";
        e.preventDefault();
    }

    //controle de l'age
    if (age.trim()=='')
    {	
		myError.innerHTML='Le champ age est requis!';
		e.preventDefault();
    }
    else
        if(Number(age)>120   || Number(age) < 16 ){
			myError.innerHTML="veuillez saisir un age valide, soit entre 16 et 100ans";
			e.preventDefault();
        }

    //controle des compétences
        if (listeComp.trim()=='')
        {	
            myError.innerHTML='Veuillez choisir au moins une compétence!';
            e.preventDefault();
        }


    //controle de l'email
    if (email.trim()=='')
    {	
        myError.innerHTML='Le champ Email est requis!';
        e.preventDefault();
    }
    else 
    if(regExEmail.test(email)==false){
        myError.innerHTML="L'adresse email n'est pas valide!";
        e.preventDefault();
    }

    alert("informations enregistrées")

}

function submit_offre(){


    //controles de saisi
        
    let myError=document.getElementById('erreur2');
    myError.style.color='red';


    // controle du titre
    var titre =document.form.titre.value;   
    let regExtitre=/^[a-zA-Z\s]+$/;

    if (titre.trim()=='')
    {	
        myError.innerHTML='Le champ titre est requis!';
        e.preventDefault();
    }
    else if(regExtitre.test(titre)==false){

        myError.innerHTML="Le champ titre doit être composé de lettres ou d'espaces!";
        e.preventDefault();
    }  

    // controle du titre
    var description =document.form.description.value;   

    if (description.trim()=='')
    {	
        myError.innerHTML='Le champ description est requis!';
        e.preventDefault();
    } 
    //controle des compétences
    let select = document.getElementById('competences');
    listeComp = "";
    for (let i=0; i<select.length; i++) 
    {
        if (select[i].selected) 
            listeComp += select[i].value + ', ';
    }
    if (listeComp.trim()=='')
    {	
        myError.innerHTML='Veuillez choisir au moins une compétence!';
        e.preventDefault();
    }

    //controle du salaire
    var salaire=document.form.salaire.value;

    if (salaire.trim()=='')
    {	
        myError.innerHTML='Le champ salaire est requis!';
        e.preventDefault();
    }
    else
        if(Number(salaire) < 460 ){
            myError.innerHTML="veuillez saisir un salaire superieur ou égal au SMIG (460DT)";
            e.preventDefault();
        }


    alert("informations enregistrées")

}


function annuler(){
    var result = confirm("Voulez vous vraiment réinitialiser la page ?");
    if(result)  {
        alert("Page réinitialisée !");
        //str1.innerHTML="";
    } else {
        alert("Demande annulée !");
    }
}
