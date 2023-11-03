function submit_cv(e){
    //controles de saisi
    let myError=document.getElementById('erreur1');
    myError.style.color='red';

    
    //controle de l'age
    var age=document.form.age.value;
    if (age.trim()=='')
    {	
		myError.innerHTML='Le champ age est requis!';
		e.preventDefault();
    }
    else
        if(Number(age)>120 || Number(age) < 16 ){
			myError.innerHTML="veuillez saisir un age valide, soit entre 16 et 100ans";
			e.preventDefault();
        }
        
        // controle diplome
        const checkdip = document.querySelectorAll('input[type="checkbox"][name="diplomes"]');

        const diplome = Array.from(checkdip).some(c => c.checked);
        if (!diplome) {
            myError.innerHTML = 'Veuillez choisir au moins un diplome!';
            e.preventDefault();
        }

        // controle comp
        const checked = Array.from(checkboxes).some(c => c.checked);
        const submitBtn = document.querySelector('button[type="submit"]');
        if (!checked) {
            myError.innerHTML = 'Veuillez choisir au moins une compétence!';
            e.preventDefault();
        }

        //controle année exp
        var nbrExp=document.form.experience.value;
        if (nbrExp.trim()=='')
        {	
            myError.innerHTML="Le champ Nombre d'années d'expérience est requis!";
            e.preventDefault();
        }

        var myButton = document.getElementById("btn"); // Get the button element by its ID
        myButton.type = "submit"; // Change the button type to "submit"
      myButton.click();
    alert("informations enregistrées")
}

function submit_offre(){
    //controles de saisi
    let myError=document.getElementById('erreur2');
    myError.style.color='red';
    myError.innerHTML="";


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

    // controle diplome
    const checkdip = document.querySelectorAll('input[type="checkbox"][name="diplomes"]');

    const diplome = Array.from(checkdip).some(c => c.checked);
    if (!diplome) {
        myError.innerHTML = 'Veuillez choisir au moins un diplome!';
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

    //controle année exp
    var nbrExp=document.form.experience.value;
    if (nbrExp.trim()=='')
    {	
        myError.innerHTML="Le champ Nombre d'années d'expérience est requis!";
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


    var myButton = document.getElementById("btn"); // Get the button element by its ID
    myButton.type = "submit"; // Change the button type to "submit"
  myButton.click();
  alert("informations enregistrées");

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