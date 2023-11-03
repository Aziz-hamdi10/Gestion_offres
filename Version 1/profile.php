<?php

$cin=$_SESSION["email"];

include ("connexion.php");

$req=$conn->prepare("select * from demandeur where Email ='$cin'");
$req->execute();
$r=$req->fetchAll(PDO::FETCH_ASSOC);
$req1=$conn->prepare("select * from utilisateur where Email ='$cin'");
$req1->execute();
$r1=$req1->fetchAll(PDO::FETCH_ASSOC);
$pic=$r1[0]['pic'];
echo "<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='utf-8'>

 

  <link href='assets1/css/profilecssF.css' rel='stylesheet'>
  <link href='assets1/vendor/bootstrap-icons/bootstrap-icons.css' rel='stylesheet'>
  <link href='assets1/vendor/boxicons/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>



  <header id='header' style='width:400px;'>

    <div class='d-flex flex-column'>

      <div class='profile'>
       ";
      
      echo'<img src = "data:image/png;base64,' . base64_encode ($pic) . ' alt="profile_pic" class="img-fluid rounded-circle"/>';
echo" 

        <h1 class='text-light'><a href='index.html'>".$r[0]['nom']." ". $r[0]['prenom']."</a></h1>
        <div class='social-links mt-3 text-center'>
        
          <a href='#' class='facebook'><i class='bx bxl-facebook'></i></a>
          <a href='#' class='instagram'><i class='bx bxl-instagram'></i></a>
          <a href='#' class='linkedin'><i class='bx bxl-linkedin'></i></a>

        </div>
      </div>
      <br>
      <br>";

      $req2=$conn->prepare("select * from competensesd where email='$cin'");
      $req2->execute();
      $r2=$req2->fetchAll(PDO::FETCH_ASSOC);
      $skills="";
      for($i=0;$i<count($r2);$i++)
      { $numc=$r2[$i]['numc'];
        $req3=$conn->prepare("select * from competenses where numc='$numc'");
        $req3->execute();
      $r3=$req3->fetchAll(PDO::FETCH_ASSOC);
      $desc=$r3[0]['description'];
      $skills=$skills.$desc."<br>";
      }
      
      echo"
      <h2 style='color:white; padding-left:120px;'>About</h2>

      <div class='row'>
      <div class='col-lg-6'>
        
        <ul>  <li><i class='bi bi-chevron-right'></i> <strong>Birthday:</strong> <span>".$r[0]['date_nai']."</span></li>        </ul>
       </div>
        <div class='col-lg-6'>

        <ul>  <li><i class='bi bi-chevron-right'></i> <strong>CIN:</strong> <span>".$r[0]['cin']."</span></li>        </ul>
        </div>
        <div class='col-lg-6'>

        <ul>  <li><i class='bi bi-chevron-right'></i> <strong>Phone:</strong> <span>".$r[0]['numero']."</span></li>        </ul>
        </div>
        <div class='col-lg-6'>

        <ul>  <li><i class='bi bi-chevron-right'></i> <strong>City:</strong> <span>".$r[0]['adresse']."</span></li>        </ul>
        </div>

        
      </div>
      <div class='row'>

      <div class='col-lg-6'>
        <ul>

          <li><i class='bi bi-chevron-right'></i> <strong>Age:</strong> <span>30</span></li></ul>
          </div>
          <div class='col-lg-6'>
<ul>
          <li><i class='bi bi-chevron-right'></i> <strong>Diplome:</strong> <span>".$r[0]['diplome']."</span></li>
          </ul>
          </div>
          <div class='col-lg-6'>
          <ul>

          <li><i class='bi bi-chevron-right'></i> <strong>PhEmailone:</strong> <span>$cin</span></li></ul>

          </div>
          <div class='col-lg-6'>
          <ul>

          <li><i class='bi bi-chevron-right'></i> <strong>Experience:</strong> <span>".$r[0]['experience']."</span></li>
          </ul>

          </div>
        </ul>
      </div>
</div>
<h2 style='color:white; padding-left:120px;'>Skills</h2>

      <p >Competenses : <span class='typed' data-typed-items>".$skills."</span></p>
      <section id='skills' class='skills section-bg' style='    background-color:#040b14;'>
      <div class='container'>

        <div class='section-title'>
        </div>

        <div class='row skills-content'>

          <div class='col-lg-6' data-aos='fade-up'>
";

$req2=$conn->prepare("select * from competensesd where email='$cin'");
      $req2->execute();
      $r2=$req2->fetchAll(PDO::FETCH_ASSOC);
      for($i=0;$i<count($r2);$i++)
      { $numc=$r2[$i]['numc'];
        
        $req3=$conn->prepare("select * from competenses where numc='$numc'");
        $req3->execute();
      $r3=$req3->fetchAll(PDO::FETCH_ASSOC);
      $desc=$r3[0]['description'];
      $score=$r2[$i]['score'];
  echo"
  <div class='progress' style='width:250px; height:20px ;     background-color:#040b14;   
  ' >
  <strong class='skill' style='font-size:1rem;     margin-right: 16px ;color:white
  '>$desc</strong>
  <div class='progress-bar' role='progressbar' style='width: $score%;' aria-valuenow='$score' aria-valuemin='0' aria-valuemax='100'>$score%</div>
</div>
<br>";
      }
echo"
<section id='contact' class='contact'>
<div class='container' > 

  <div class='section-title' >
  <h2 style='color:white; padding-left:40px;padding-bottom:50px;'>Contact</h2>

  </div>

  <div class='row' data-aos='fade-in' >

    <div class='col-lg-5 d-flex align-items-stretch' >
      <div class='info'  style=' background-color:#040b14;'>
        <div class='address'>
          <i class='bi bi-geo-alt'></i>
          <h4 style='color:white'>Location:</h4>
          <p style='color:white;font-size:1.2rem;'>".$r[0]['adresse']."</p>
        </div>

        <div class='email'>
          <i class='bi bi-envelope'></i>
          <h4 style='color:white'>Email:</h4>
          <p style='color:white;font-size:1.2rem;'>".$r[0]['Email']."</p>
        </div>

        <div class='phone'>
          <i class='bi bi-phone'></i>
          <h4 style='color:white'>Call:</h4>
          <p style='color:white;font-size:1.2rem;'>".$r[0]['numero']."</p>
        </div>

      </div>
      

    </div>
</div>
<div class='row' data-aos='fade-in'>

    <div class='col-lg-5 d-flex align-items-stretch'>
      <div class='info'  style=' background-color:#040b14;margin:0px;'>
        <div class='address'>
          <i class='bi bi-facebook'></i>
          <h4 style='color:white'>Facebook:</h4>
          <p style='color:white;font-size:1.2rem;'>".$r[0]['adresse']."</p>
        </div>

        <div class='email'>
          <i class='bi bi-instagram'></i>
          <h4 style='color:white'>Instagram:</h4>
          <p style='color:white ;font-size:1.2rem;'>".$r[0]['Email']."</p>
        </div>

        <div class='phone'>
          <i class='bi-linkedin'></i>
          <h4 style='color:white'>Linkein:</h4>
          <p style='color:white ; font-size:1.2rem;'>".$r[0]['numero']."</p>
        </div>

      </div>
     

 

</div>
</section><!-- End Contact Section -->



          </div>

         

            


          

          </div>

        </div>

      </div>
    </section><!-- End Skills Section -->
     
    </div>
  </header><!-- End Header -->


  <script src='assets1/js/main.js'></script>
  <script src='assets1/vendor/purecounter/purecounter_vanilla.js'></script>
  <script src='assets1/vendor/aos/aos.js'></script>
  <script src='assets1/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>
  <script src='assets1/vendor/glightbox/js/glightbox.min.js'></script>
  <script src='assets1/vendor/isotope-layout/isotope.pkgd.min.js'></script>
  <script src='assets1/vendor/swiper/swiper-bundle.min.js'></script>
  <script src='assets1/vendor/typed.js/typed.min.js'></script>
  <script src='assets1/vendor/waypoints/noframework.waypoints.js'></script>
  <script src='assets1/vendor/php-email-form/validate.js'></script>

</body>

</html>";

?>
