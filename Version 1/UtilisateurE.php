<?php
session_start();
$email= $_SESSION['email'];
$passsowrd= $_SESSION['password'];

include ("connexion.php");
   $sth = $conn->prepare("SELECT * FROM utilisateur where password='$passsowrd' and Email='$email'");
   $sth->execute();
       $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
   
       if(isset($_POST['logout'])){
        header("Location:home.php");

       }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">
               



        <link href="css/bootstrap.min.css" rel="stylesheet">


        <link href="css/indexF.css" rel="stylesheet">
        

    </head>
    
    <body>

        <main>

            <nav class="navbar navbar-expand-lg" >                
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="index.html">
                        <img src="images/logo.png" class="navbar-brand-image img-fluid" alt="Tiya Golf Club">
                        <span class="navbar-brand-text">
                            Khademny
                            <small>Tunisia</small>
                        </span>
                    </a>

                    <div class="d-lg-none ms-auto me-3">
                        <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"> Login</a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav" >
                        <ul class="navbar-nav ms-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1">Home</a>
                            </li>
    
                         

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#home-packages">offres</a>
                            </li>
                           <?php
                           echo" <li class='nav-item'>
                           <a class='nav-link click-scroll' href='empoffre.php?email=$email'>Your offres</a>
                       </li>";
                           ?>
                            <li class="nav-item">
                            <a class="nav-link click-scroll" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add offre</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="listerDemendes.php">Demandes</a>
                            </li>

                         
                        </ul>

                        <div class="d-none d-lg-block ms-lg-3">
                        <?php
                        $sth = $conn->prepare("SELECT * FROM Employeur where  Email='$email'");
                        $sth->execute();
                        $r = $sth->fetchAll(PDO::FETCH_ASSOC);
              
                        $name=$r[0]['nom_entreprise'];
                        $ch='togglemenu()';
                        echo 
                        '<img src = "data:image/png;base64,' . base64_encode ($resultat[0]["pic"]) . '" class="user" onclick='.$ch. ' />';
                     
                        print_r( "
                        <div class='sub-menu-wrap' id='sub-menu'>
                            <div class='sub-menu'>
                                <div class='userinfo'>");

                                echo 
                                '<img src = "data:image/png;base64,' . base64_encode ($resultat[0]["pic"]) . '"  onclick='.$ch. ' />';
                             
                                print_r("
                                    <img src='Aziz.jpg'>
                                    <h2>$name</h2>
                                </div>
                                <hr>
                                <a1 class='sub-menu-link'>
                                    <img src='profile.png'>
                                    
                                    <p>Edit profile</p>
                                </a1>
                                <a1 class='sub-menu-link'>
                                    <img src='setting.png'>
                                    <p>Settings</p>
                                    <span></span>
                                </a1>
                                <a1 class='sub-menu-link'>
                                    <img src='help.png'>
                                    <p>Help & Support</p>
                                    <span></span>
                
                                </a1>
                                <a1 class='sub-menu-link'>
                                    <img src='logout.png'>
                                    
                              <a href='index1.php' name='logout'>Logout</a>
                                    <span></span>
                
                                </a1>");
                        ?>


                        
                    </div>
                </div>
            </nav>

      
            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1" style="background-image: url('work1.jpg');">

                <div class="section-overlay"></div>


                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 ">
                            <h2 class="text-white">Welcome to Khademni</h2>

                            <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                                <span>Found Now</span>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible">Dream Job</b>
                                    <b>Employer</b>
                                    <b>Applicant</b>
                                </span>
                            </h1>

                            <div class="custom-btn-group">
                                <a href="#section_2" class="btn custom-btn smoothscroll me-3">FOUND NOW !</a>

                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="ratio ratio-16x9">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/MGNgbNGOzh8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
            </section>


        </main>

  <?php
include("offres.php");



?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Add offre</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
<?php
include("addof.php")
?>
  </div>
</div>
        <!-- JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
      <script>
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
function verif2(){
    var next = document.getElementById("btn-next"); // Get the button element by its ID    

    var email = document.getElementById("email").value;
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("password1").value;
    var error = document.getElementById("error");

    error.innerHTML = "";

    var selectBox = document.getElementsByTagName("select")[0];
  var selectedValue = selectBox.options[selectBox.selectedIndex].value;
  var div = document.getElementById("regis-emp");
  var divD = document.getElementById("regis-dmd");

    var emailRegex = /\S+@\S+\.\S+/;

    if(emailRegex.test(email)==false){
        error.innerHTML = "<strong style='color :red;'>Verif Your Email !</strong>";
        div.style.display = "none";
        divD.style.display = "none";

        next.style.display="block";

    

    }
    else{
      if(pass1!=pass2 || pass1=="")
      {
        error.innerHTML = "<strong style='color :red;'>Wrong password</strong>";
        div.style.display = "none";
        next.style.display="block";
        divD.style.display = "none";


      }
      else{
        if(selectedValue=='0')
        {
            error.innerHTML = "<strong style='color :red;'>Select Post !</strong>";
            div.style.display = "none";
            divD.style.display = "none";

            next.style.display="block";

        }
        else{
            error.innerHTML = "<strong style='color :green;'>Every thing alright !</strong>";
            if(selectedValue=='Employeur')
{
    var error1 = document.getElementById("error1");

    var names = document.getElementById("names").value;
    var fname = document.getElementById("Fname").value;
    var Sname = document.getElementById("Sname").value;
    const pic = document.getElementById("Picture");
   error1.innerHTML="";


    if(names==""){
        error1.innerHTML = "<strong style='color :red;'>Write name Societe !</strong>";
    }
    else {
        if(fname==""){
            error1.innerHTML = "<strong style='color :red;'>Write First name Gerant !</strong>";

    }
    else{
        if(Sname==""){
            error1.innerHTML = "<strong style='color :red;'>Write Second name Gerant !</strong>";

                      }
    else{
        if(pic.value==='')
        {
            error1.innerHTML = "<strong style='color :red;'>Select a picture !</strong>";

        }
        else{
           
            var myButton = document.getElementById("myButton"); // Get the button element by its ID
  myButton.type = "submit"; // Change the button type to "submit"
myButton.click();
            
        }
    }
    

    }
  

        }
    
}
else{
    var error = document.getElementById("error2");

    var nom = document.getElementById("FnameD").value;
    var prenom = document.getElementById("SnameD").value;
    var cin = document.getElementById("cin").value;
    const pic = document.getElementById("PictureD");
    const testcin = /^[0-9]{8}$/;       //ne contient que des chiffres et si elle ne dépasse pas 8 caractères
    const chaine = /^[a-zA-Z]+$/;
    if(testcin.test(cin)==false){
        error.innerHTML = "<strong style='color :red;'>Verif Your CIN !</strong>";
     
    }
    else{
    
        if(chaine.test(nom)==false||nom==""){
            error.innerHTML = "<strong style='color :red;'>Wrong First name !</strong>";

        }
        else{
            if(chaine.test(prenom)==false||prenom==""){
            error.innerHTML = "<strong style='color :red;'>Wrong Second name !</strong>";

        }
        else{
            if(pic.value===''){
                error.innerHTML = "<strong style='color :red;'>Select a picture !</strong>";

            }
            else
            { 
                var myForm = document.getElementById("myform");
  myForm.action = "addDmd.php";
    
  var myButton = document.getElementById("myButton2"); // Get the button element by its ID
  myButton.type = "submit"; // Change the button type to "submit"
myButton.click();
               
            }
          
           

        }

        }
    }

   

}
        }
    }
}
}    
function myfn(p) {
  let boxes=[...document.querySelectorAll('.packages .box-container .box')];
  var div = document.querySelector('.packages .load-more .btn');
  var j=0;
  if(p-3-y>=3)
  {
    mzl=3;
  }
  else
  {
    mzl=p-3-y;

  }
  while(j<mzl)
  {
    boxes[j+y].style.display='inline-block';
    j++;
  }
  y+=3;
  if(y+3>=p)
  { div.style.display="none";
  }

}
      </script>

    </body>
</html>