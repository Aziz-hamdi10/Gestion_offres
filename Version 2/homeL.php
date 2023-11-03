<?php
if(isset($_GET['wrap']))
{
  $wrap="wrap active-btn";

}
else
{$wrap='wrap';
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
 
  
  <link rel="stylesheet" href="assetsL/css/fontawesome.css">
 <link rel="stylesheet" href="home2.css" />
  <!-- Demo styles -->
  
</head>

<body>
<header>
        <h2 class="logo">Workini</h2>
        <div class="search-input">
                     
                    </div>
        <nav class="nav">
            <a>Home</a>
            <a>About</a>
            <a href="#services">Services</a>
            <a>Contact</a>
            
            <button class="login" onclick="btnlogin()">Login</button>
           
        </nav>
    </header>
    <?php
    
    $email="";
    $passsowrd="";
    $erroin="";
    $regis="";
   
 
 session_start();
 session_destroy();
 session_start();
 include ("connexion.php");
 if( $wrap=="wrap")
 { 
     $erroin="";
     $error="";
 }
 
  if(isset($_POST['btn-login']))
  {
     $email=$_POST['email'];
     $passsowrd=$_POST['passowrd'];
 
     $sth = $conn->prepare("SELECT * FROM utilisateur where password='$passsowrd' and Email='$email'");
         $sth->execute();
             $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
           
             if($resultat){
         
                 $_SESSION['email']=$email;
                 $_SESSION['password']=$passsowrd;
                 
                 if( $resultat[0]["type"]=="Employeur")
                 {
                     header("Location:utilisateur1.php");
                 }
                 else {
 
                     header("Location:utilisateur2.php");}
 
         }
             else 
             {
                 $error="Adresse Mail ou Mots passe incorrecter";
             }
  }
  if(isset($_GET['error']))
  {
    echo"
    <div class='okhto' align='center'>
   
    
   <div  class='wrap active-btn'>";
  }
  else
  {
    echo"
    <div class='okhto' align='center'>
   
    
   <div  class='wrap'>";

  }

?>
    <span id='close' class='close' name='close' onclick='close1()'><ion-icon name='close-outline' ></ion-icon></span>
    <div class='form-login'>
        <h2>Login </h2>
        <form action='' method='POST'>
         
                <div class='input'>
                    <span class='icon'><ion-icon name='mail-outline'></ion-icon></span>
                    <input name='email' id='email1' type='email' required>
                    <label >Email</label>
                </div>
                <div class='input'>
                    <span class='icon'><ion-icon name='lock-closed-outline' ></ion-icon></span>
                    <input name='passowrd' id='password' type='password' required >
                    <label >Password</label>
                </div>
                <div class='remember'>
                   <label ><input type='checkbox'>
                    Remember me</label>
                    <a>Forgot Password ?</a>
                </div><button type='button' class='btn'name='btn-login' onclick='verif1()'>Login</button>
                <p class='error' id='error1'name='error'> </p>
<?php
if(isset($_GET['error']))
{
    echo"                <p class='error' id='error1'name='error'>".$_GET['error']. "</p>
    ";
}
?>
            <div class='loginregis'>
                <p>Don't have a account? <a href='#'class='regis-link' onclick='active()'>Register</a></p>
            </div>
        </form> 
</div>

<div class='form-rengis1' name='form2'>
        <h2>Registration </h2>
        <form action='addDmd.php' method='POST'>
            <div class='input'>
                <span class='icon'><ion-icon name='person-outline'></ion-icon></span>
                <input name='email2' id='email2' type='Email' required>
                <label >Email</label>
            </div>
            <div class='input'>
            <span class='icon'><ion-icon name='lock-closed-outline' ></ion-icon></span>
            <input name='password2' id='password2' type='password' required >
            <label >Password</label>
        </div>
        <div class='input'>
        <span class='icon'><ion-icon name='lock-closed-outline' ></ion-icon></span>
        <input name='password1' id='password1' type='password' required >
        <label >Confirmation Password</label>
    </div>
            <div class='input'>
            <span class='icon'><ion-icon name='chevron-down-outline'></ion-icon></span>

            <div class='select'>
            <select name='format' id='format' >
               <option value='0'>Choose a post</option>
               <option value='Employeur'>Employeur</option>
               <option value='demandeur'>demandeur</option>
              
            </select>
         </div>  
        
        </div>
        <p class='error' id='error2' name='error2'> </p>


         <div class='remember'>
                   <label ><input type='checkbox'>
                    I agree to the terms & conditon</label>
                </div>
                <button  class='btn' type=' '  onclick='btnlogin()'>Back</button>

            <button  class='btn' type='button' name='btn-next1' onclick='verif2()'>Next</button>
                <div class='loginregis'>
                    <p>Already have a account? <a href='#' class='login-link' onclick='diactive1()'>Login</a></p>
                </div>
            </form>
            
           
        
        </div>
        
        <?php
       
                         if(isset($_POST['btn-next1']))
                         {
                            $email=$_POST['form2']['email2'];
                                               header("Location:utilisateur1.php");

                         }                        
                         
                     
                        
                ?>
    
    <div class='form-rengis2'   id='form-rengisE'style='visibility:hidden;'>
            <h2>Suite </h2>
            <form  method='POST' action='addEmp.php' enctype='multipart/form-data'>
          
        <div class='input'>
            <span class='icon'><ion-icon name='person-outline'></ion-icon></span>
            <input name='nomentreprise' id='nomentreprise'  type='text' required>
            <label >Nom EntrePrise</label>
        </div>
                    <input name='emailE' id='emailE'  type='text' style="display:none">
                    <input name='motE' id='motE'  type='text'style="display:none" >

        <div class='input'>
            <span class='icon'><ion-icon name='person-outline'></ion-icon></span>
            <input name='nomgerant'id='nomgerant' type='text' required>
            <label >Nom Gerant</label>
        </div>
        <div class='input'>
        
        <input name='prenomgerant'id='prenomgerant' type='text' required>

        <label for='profile-pic'>Prenom Gerant</label>
        
        </div>
        <div class='input'>
     
     <input type='file' name='picture' id='Picture'>
     <label for='profile-pic'></label>
     
     </div>
        
        
     <p class='error' id='error3' name='error3'> </p>
       
                    
        <button  class='btn' onclick='active()'>Back</button>
        
        <button type='button' id='Enregistrer' name='Enregistrer' class='btn'  onclick='verif3()' >Enregistrer</button>
        
                </form>
               
        </div>
        

         <div class='form-rengis2' id='form-rengisD' style='visibility:hidden;'>
         <h2>Suite </h2>
         <form action='addDmd.php' method='POST' enctype='multipart/form-data'>
         <div class='input'>
         <span class='icon'><ion-icon name='person-outline'></ion-icon></span>
         <input name='cin'id='cin' type='text' required>
         <label >CIN</label>
     </div>
     <div class='input'>
         <span class='icon'><ion-icon name='person-outline'></ion-icon></span>
         <input name='nom' id='nom' type='text' required>
         <label >Nom</label>
     </div>
     <div class='input'>
         <span class='icon'><ion-icon name='person-outline'></ion-icon></span>
         <input name='prenom' id='prenom' type='text' required>
         <label >Prenom</label>
     </div>
    
     <div class='input'>
     
     <input name='Picture1' id='Picture1' type='file' >
     <label for='profile-pic'></label>
     
     </div>
     <input name='emailE' id='emailE1'  type='text' style="display:none">
    <input name='motE1' id='motE1'  type='text'style="display:none" >
     <p class='error' id='error4' name='error4'> </p>

             
                 
     <button  class='btn' type='submit'  onclick='active()'>Back</button>
     
             <button id='Enregistrer2'  type='button'name='Enregistrer2' class='btn'  onclick='verif4()'>Enregistrer</button>
     
             </form>
     </div>

     </div>

</div>
<?php
if(isset($_GET["filtrer"]))
{
  $f=$_GET["filtrer"];
  if($f=="DISPO")
  {
      include("offreDISPO.php");

  }
  else
  {
      if($f=="CV")
{
  include("offreCV.php");

}
else{
  include("offrePrices.php");


}

      
  }

}
else{
include("offre.php");
}


require_once("services.php");
?>
</div>
<footer>
        
    <div class="row">
        <div class="col">
        <div class="logo" style='margin-left:50px;'>Workini</div>


        </div>
        <div class="col">
            <h3>office <div class="underline"><span></span></div></h3>
            <ul>
                <li>
            <a href="https://www.fifa.com/fr">Work.tn</a></li>
            <br><br>
            <li>
            <a href="https://www.fifa.com/fifaplus/fr/tournaments/mens/worldcup/qatar2022"></a></li>
    </ul>
        </div>
        <div class="col">
            <h3>links <div class="underline"><span></span></div></h3>
            <ul>
                <li><a href="Index.html">Home</a></li>
                <li><a href="#afrique">Les offres</a></li>
                <li><a href="#asia">Services</a></li>
                <li><a href="#europe">About us</a></li>
                

                
            </ul>
        </div>
        <div class="col">
            <h3>Feed back <div class="underline"><span></span></div></h3>
            <porm>
                <i class="far fa-envelope"></i>
                <input type="email" placeholder="Enter your email id" required>

                <button type="submit"><i class="fas fa-arrow-right"></i></button>
        </porm>
        <porm>
               
                <input type="text" placeholder="Enter Feed back" required>

        </porm>

        <div class="social-icons">
        <i class="fab fa-facebook"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-youtube"></i>
        </div>
    </div>
</div>
 <hr>
 <div class="row d-flex justify-content-center align-items-center">
    <div class="col-xs col-md-auto ff-mt-16 text-sm ff-mb-0 text-uppercase undefined">
        <a class="footer_LegalItems__ZWnDD" href="https://www.fifa.com/data-protection-portal/data-protection-policy" style="--textColor:#FFF; --secondaryColor:#DAC96D; " >Politique de confidentialité</a>
    </div><div class="col-xs col-md-auto ff-mt-16 text-sm ff-mb-0 text-uppercase undefined"><a class="footer_LegalItems__ZWnDD" href="https://www.fifa.com/terms-of-service" style="--textColor:#FFFFFF; --secondaryColor:#DAC96D;">Conditions d'utilisation</a></div>
        <div class="col-xs col-md-auto ff-mt-16 text-sm ff-mb-0 text-uppercase undefined"><a class="footer_LegalItems__ZWnDD" href="https://www.fifa.com/fifaplus/en/articles/advertise-with-us" style="--textColor:#FFFFFF; --secondaryColor:#DAC96D;">PUBLICITÉ</a>
        </div><div class="d-flex justify-content-start align-items-center col-xs col-md-auto ff-mt-16 text-sm ff-mb-0 text-uppercase undefined"><div id="ot-sdk-btn" class="col-xs  text-sm ff-mb-0 text-uppercase ot-sdk-show-settings footer_CookieButtonLabel__3Njj_">Preference Center</div></div></div>
 <hr>
 <p class="copyright">Copyright .</p>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="home.js"></script>
<script>
 
    function verif1(){
    var email = document.getElementById("email1").value;
    var pass1 = document.getElementById("password").value;
    var error = document.getElementById("error1");
    error.innerHTML = "";

    var emailRegex = /\S+@\S+\.\S+/;

    if(emailRegex.test(email)==false){
        error.innerHTML = "<strong style='color :red;'>Verif Your Email !</strong>";
     
    }
    else{
        if(pass1=="")
        {
            error.innerHTML = "<strong style='color :red;'>Write a password !</strong>";

        }
        else{
            window.location.href = 'Login.php?email='+email+'&password='+pass1;

        }

    }
}
function verif2(){
  
   
    var email = document.getElementById("email2").value;
    var pass1 = document.getElementById("password2").value;
    var error = document.getElementById("error2");
    var pass2 = document.getElementById("password1").value;
    var selectBox = document.getElementsByTagName("select")[0];
    var regis= document.getElementsByTagName("form-rengis2");
  var selectedValue = selectBox.options[selectBox.selectedIndex].value;
  error.innerHTML = "";

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
            if(selectedValue=='Employeur')
            {       var regisD = document.getElementById("form-rengisD");
 regisD.style.visibility="hidden";             
               
                var regis = document.getElementById("form-rengisE");
 regis.style.visibility="visible";
 
             
 regis2();
            }
            else{

                var regisE = document.getElementById("form-rengisE");
 regisE.style.visibility="hidden";
                var regis = document.getElementById("form-rengisD");
 regis.style.visibility="visible";
             
 regis2();
            }
           

        }

      }
    }
  


}
function verif3(){
    var email = document.getElementById("email2").value;
    var emaile = document.getElementById("emailE").value;
    var motE = document.getElementById("motE").value;

    var pass1 = document.getElementById("password2").value;
    var error = document.getElementById("error3");
    var pass2 = document.getElementById("password1").value;
    var selectBox = document.getElementsByTagName("select")[0];
    var regis= document.getElementsByTagName("form-rengis2");
    var noms=document.getElementById("nomentreprise").value;
    var prenomgerant=document.getElementById("prenomgerant").value;
    var nomgerant=document.getElementById("nomgerant").value;
    const pic = document.getElementById("Picture");

if(noms=="")
{
    error.innerHTML = "<strong style='color :red;'>Write Societe name !</strong>";

}
else{
    if(prenomgerant=="")
{
    error.innerHTML = "<strong style='color :red;'>Write Gerant Second name !</strong>";

}
else{
    if(nomgerant=="")
{
    error.innerHTML = "<strong style='color :red;'>Write Gerant First Name!</strong>";

}
else{
    if(pic.value==='')
        {
            error.innerHTML = "<strong style='color :red;'>Select a picture !</strong>";

        }
        else{
            var input = document.getElementById("motE");
    input.value =pass2 ;
    var input2 = document.getElementById("emailE");
    input2.value =email ;
    var myButton = document.getElementById("Enregistrer"); // Get the button element by its ID
  myButton.type = "submit"; // Change the button type to "submit"
myButton.click();

            

        }
}
}

}


}
function verif4(){
    var email = document.getElementById("email2").value;
    var pass2 = document.getElementById("password1").value;
   
    const testcin = /^[0-9]{8}$/;       //ne contient que des chiffres et si elle ne dépasse pas 8 caractères
    const chaine = /^[a-zA-Z]+$/;
    var cin = document.getElementById("cin").value;
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var error = document.getElementById("error4");
    error.innerHTML = "";
    const pic = document.getElementById("Picture1");

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
                
                var input = document.getElementById("motE1");
                input.value =pass2 ;
    var input2 = document.getElementById("emailE1");
    input2.value =email ;
    var myButton = document.getElementById("Enregistrer2"); // Get the button element by its ID
  myButton.type = "submit"; // Change the button type to "submit"
myButton.click();
            }
          
           

        }

        }
    }




        
    }
    </script>
