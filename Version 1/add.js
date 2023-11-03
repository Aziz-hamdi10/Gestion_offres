function submit_cv(e){
    //controles de saisi
    let myError=document.getElementById('erreur1');
    myError.style.color='red';
    myError.innerHTML="";

    //controle de l'age
    var age=document.getElementById('age').value;
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
           //controle année exp
           var nbrExp=document.getElementById('experience').value;
        
           if (nbrExp.trim()=='')
           {	
               myError.innerHTML="Le champ Nombre d'années d'expérience est requis!";
               e.preventDefault();
           }
        // controle diplome
        var myButton = document.getElementById("btn"); // Get the button element by its ID
        myButton.type = "submit"; // Change the button type to "submit"
        alert(myButton.type);
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


        var myButton = document.getElementById("btn1"); // Get the button element by its ID
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
let x=1;
let submenu=document.getElementById("sub-menu");
function togglemenu(){
    if( x%2==0)
    {
        submenu.className=("sub-menu-wrap-open-menu");
        x++;
    }
    else
    {
        submenu.className=("sub-menu-wrap");
        x++;

    }
  
}
let y=0;
let mzl=3;
function verif1(){
var next = document.getElementById("btn-next"); // Get the button element by its ID    
var email = document.getElementById("email").value;
var pass1 = document.getElementById("password").value;
var pass2 = document.getElementById("password1").value;
var error = document.getElementById("error");
error.innerHTML = "";

var selectBox = document.getElementsByTagName("select")[0];
var selectedValue = selectBox.options[selectBox.selectedIndex].value;


var emailRegex = /\S+@\S+\.\S+/;
if(emailRegex.test(email)==false){
error.innerHTML = "<strong style='color :red;'>Verif Your Email !</strong>";


}
else{
if(pass1!=pass2 || pass1=="")
{
error.innerHTML = "<strong style='color :red;'>Wrong password</strong>";

}
else{
if(selectedValue=='0')
{
    error.innerHTML = "<strong style='color :red;'>Select Post !</strong>";

}
else{
    error.innerHTML = "<strong style='color :green;'>Every thing alright !</strong>";
    if(selectedValue=='Employeur')
{
var div = document.getElementById("regis-emp");
div.style.display = "block";
next.style.display="none";


}
else{
var div = document.getElementById("regis-dmd");
div.style.display = "block";
next.style.display="none";

}

}

}


}



}
