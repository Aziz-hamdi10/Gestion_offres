<?php
include("connexion.php");
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
                                <a class="nav-link click-scroll" href="#About">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#home-packages">offres</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#services">Services</a>
                            </li>

                         
                        </ul>

                        <div class="d-none d-lg-block ms-lg-3">
                            <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample" >Member Login</a>
                        </div>
                    </div>
                </div>
            </nav>

<?php
            if(isset($_GET['error']))
{
    echo"            <div class='offcanvas offcanvas-end show' data-bs-scroll='true' tabindex='-1' id='offcanvasExample' aria-labelledby='offcanvasExampleLabel'>                
    ";
}
else {
   echo"             <div class='offcanvas offcanvas-end' data-bs-scroll='true' tabindex='-1' id='offcanvasExample' aria-labelledby='offcanvasExampleLabel'>                
";
}
?>
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Member Login</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                
                <div class="offcanvas-body d-flex flex-column">
                    <form class="custom-form member-login-form" action="" method="post" role="form">

                        <div class="member-login-form-body">
                            <div class="mb-4">
                                <label class="form-label mb-2" for="member-login-number">Email</label>

                                <input type="text" id="emailL" name="emailL" class="form-control" placeholder="exemple1@exemple2.exemple3" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label mb-2" >Password</label>

                                <input type="password" name="passwordL" id="passwordL" pattern="[0-9a-zA-Z]{4,10}" class="form-control" placeholder="Password" required="">
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div>
                            <?php
                            if(isset($_GET['error']))
                            {
                                echo"   <p  style='color:red'>".$_GET['error']."</p>";

                            }
?>
<p id='errorL' style='color:red'></p>
                            <div class="col-lg-5 col-md-7 col-8 mx-auto">
                                <button type="button" class="form-control"onclick='verif5()'>Login</button>

                            </div>

                            <div class="text-center my-4">
                                <a href="#">Forgotten password?</a>

                            </div>
                            <div class="text-center my-4">
                                <a href="#section_3" class="link smoothscroll">Become a member</a>

                            </div>
                        </div>
                    </form>

                    <div class="mt-auto mb-5">
    
                    </div>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3D405B" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
            </div>
            

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
                                <a href="#section_2" class="btn custom-btn smoothscroll me-3">Offres</a>

                                <a href="#section_3" class="link smoothscroll">Become a member</a>
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


           


          


            <section class="membership-section section-padding" id="section_3">
             <div class="container">
                <div  class="regis">
                    <div class="row">
                    <form id='myform' action="addemp.php" method="post" class="custom-form membership-form shadow-lg"  role="form" style="width:700px ;margin-left:290px;"enctype="multipart/form-data">

                        <div class="col-lg-5 col-12 mx-auto">
                            
                        <h4 class="mb-4 pb-lg-2">join us!</h4>
                                <h4 class="text-white mb-4">Become a member</h4>

                                  

                                    <div class="form-floating" >
                                        <input type="email" name="email1" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                        
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Full Name" required="">
                                        
                                        <label for="floatingInput">Password</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" name="password" id="password1" class="form-control" placeholder="Full Name" required="">
                                        
                                        <label for="floatingInput">Confirmation Password</label>
                                        
                                    </div>
                                    
                                               <div class='select' name='emp' id='emp' style="width:370px;">
                                                      <select name='format' id='format' class="form-control" >
                                                                <option value='0'>Choose a post</option>
                                                                <option value='Employeur'>Employeur</option>
                                                                 <option value='demandeur'>demandeur</option>
              
                                                     </select>
                                              </div> 
                                              <div>
                                                <p id='error'></p>
                                              </div>

                                    <button type="button" name="btn-next" id="btn-next" class="form-control" onclick="verif1()">next</button>
                                
                            
                        </div>
                        <div class="col-lg-5 col-12 mx-auto" style="display:none" id="regis-emp" >
                            
                            <h4 class="mb-4 pb-lg-2">Next</h4>
                                    <h4 class="text-white mb-4">Employer</h4>
    
                                      
    
                                        <div class="form-floating">
                                            <input type="text" name="names" id="names"  class="form-control" placeholder="Name Societe" >
                                            
                                            <label for="floatingInput">Name Societe</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="text" name="Fname" id="Fname" class="form-control" placeholder="First name Gerant" >
                                            
                                            <label for="floatingInput">First name Gerant</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="yext" name="Sname" id="Sname" class="form-control" placeholder="Second name Gerant" >
                                            
                                            <label for="floatingInput">Second name Gerant</label>
                                            
                                        </div>
                                        <div class="form-floating">
                                            <input type="FILE" name="Picture" id="Picture" class="form-control" placeholder="Picture" >
                                            
                                            <label for="floatingInput">Picture profile</label>
                                            <p id='error1'></p>

                                            
                                        </div>
                                        
                                        
                                             
    
                                        <button type="button" class="form-control" id="myButton" onclick="verif2()">Submit</button>
                                    
                                
                            </div>
                            <div class="col-lg-5 col-12 mx-auto" style="display:none" id="regis-dmd" >
                            
                            <h4 class="mb-4 pb-lg-2">Next</h4>
                                    <h4 class="text-white mb-4">Employer</h4>
    
                                      
    
                                        <div class="form-floating">
                                            <input type="text" name="cin" id="cin"  class="form-control" placeholder="cin" >
                                            
                                            <label for="floatingInput">CIN</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="text" name="FnameD" id="FnameD" class="form-control" placeholder="First name Gerant" >
                                            
                                            <label for="floatingInput">First name </label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="yext" name="SnameD" id="SnameD" class="form-control" placeholder="Second name Gerant" >
                                            
                                            <label for="floatingInput">Second  Name</label>
                                            
                                        </div>
                                        <div class="form-floating">
                                            <input type="FILE" name="PictureD" id="PictureD" class="form-control" placeholder="Picture" >
                                            
                                            <label for="floatingInput">Picture profile</label>
                                            <p id='error2'></p>

                                            
                                        </div>
                                        
                                        
                                             
    
                                        <button type="button" class="form-control" id="myButton2" onclick="verif2()">Submit</button>
                                    
                                
                            </div>
                    </from>
                     </div>

                 </div>
             </div>
            </section>


        


          
        </main>

      
 <?php

include("offres.php")
?>

        <!-- JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
      <script>
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
function verif5(){
    var error = document.getElementById("errorL");
    error.innerHTML="";
    var email = document.getElementById("emailL").value;
    var pass = document.getElementById("passwordL").value;
    var emailRegex = /\S+@\S+\.\S+/;
    if(emailRegex.test(email)==false){
    error.innerHTML = "<strong style='color :red;'>Wrong Email !</strong>";

}
else{

    if(pass==""){
        error.innerHTML = "<strong style='color :red;'>Write your password !</strong>";

    }
    else{
        window.location.href = "login.php?email="+email+"&pass="+pass;
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