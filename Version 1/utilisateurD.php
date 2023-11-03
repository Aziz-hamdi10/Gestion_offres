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
    $sth = $conn->prepare("SELECT * FROM Demandeur where  Email='$email'");
    $sth->execute();
    $r = $sth->fetchAll(PDO::FETCH_ASSOC);
 $name=$r[0]['nom']." ".$r[0]['prenom'];
 if($r[0]['age']==-1)
 {
     echo"
     <li class='nav-item'>
     <a class='nav-link click-scroll' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight'>Add cv</a>
     </li> 
     
     ";
 }
else{
echo"
<li class='nav-item'>
<a class='nav-link click-scroll' data-bs-toggle='offcanvas' href='#offcanvasExample' role='button' aria-controls='offcanvasExample'>
  Profile
</a>
</li> 
";
echo"  <li class='nav-item'>
<a class='nav-link click-scroll' href='jobsubmitted.php?email=$email'>job submitted</a>
</li>"
;

}
                            ?>
                         

                          
                         

                         
                        </ul>

                        <div class="d-none d-lg-block ms-lg-3">
                        <?php
                     
                    
                    $ch='togglemenu()';
                    echo 
                    '<img src = "data:image/png;base64,' . base64_encode ($resultat[0]["pic"]) . '" class="user" onclick='.$ch. ' />';
                 
                    print_r( "
                    <div class='sub-menu-wrap' id='sub-menu'>
                        <div class='sub-menu'>
                            <div class='userinfo'>
                            ");

                                echo 
                                '<img src = "data:image/png;base64,' . base64_encode ($resultat[0]["pic"]) . '"  onclick='.$ch. ' />';
                            
                               print_r(" <h2>$name</h2>
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


           


          




        


          
        </main>

        <?php
include("offres.php");
     
              
    $sth = $conn->prepare("SELECT * FROM Demandeur where  Email='$email'");
    $sth->execute();
    $r = $sth->fetchAll(PDO::FETCH_ASSOC);
 if($r[0]['age']!=-1)
 {
     echo"<div class='offcanvas offcanvas-start' tabindex='-1' id='offcanvasExample' aria-labelledby='offcanvasExampleLabel'>
     <div class='offcanvas-header'>
       <h5 class='offcanvas-title' id='offcanvasExampleLabel'>Profile</h5>
       <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
     </div>
     <div class='offcanvas-body'>
       ";
       $_SESSION['emailf']=$email;
       include('profile.php');
       echo"
     </div>
   </div>
   ";}
      else{
        echo"<div class='offcanvas offcanvas-end' tabindex='-1' id='offcanvasRight' aria-labelledby='offcanvasRightLabel'>
        <div class='offcanvas-header'>
          <h5 id='offcanvasRightLabel'>Profile</h5>
          <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
        </div>
        <div class='offcanvas-body'>";
       include("cv.php");
       echo"   </div>
       </div>";
      }
  


?>


        <!-- JS -->
                <script src="add.js"></script>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        


    </body>
</html>