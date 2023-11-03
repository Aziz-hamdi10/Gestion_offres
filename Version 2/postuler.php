<?php

$cin=$_GET["cin"];

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




  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i' rel='stylesheet'>

  <link href='assets1/vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
  <link href='assets1/vendor/bootstrap-icons/bootstrap-icons.css' rel='stylesheet'>
  <link href='assets1/vendor/boxicons/css/boxicons.min.css' rel='stylesheet'>

  <!-- Template Main CSS File -->
  <link href='profilecss.css' rel='stylesheet'>
</head>

<body>



  <header id='header'>
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

      <nav id='navbar' class='nav-menu navbar'>
        <ul>
          <li><a href='#hero' class='nav-link scrollto active'><i class='bx bx-home'></i> <span>Home</span></a></li>
          <li><a href='#about' class='nav-link scrollto'><i class='bx bx-user'></i> <span>About</span></a></li>
          <li><a href='#skills' class='nav-link scrollto'><i class='bx bx-user'></i> <span>Skills</span></a></li>

          <li><a href='#contact' class='nav-link scrollto'><i class='bx bx-envelope'></i> <span>Contact</span></a></li>
          ";
          if(isset($_GET['emaile']))
          {
$e=$cin;
$email=$_GET['emaile'];
$offre=$_GET['codeoffre'];
$t=$_GET['titreoffre'];
            echo"
            <a href='Accepter.php?v=False&emaild=$e&emaile=$email&codeoffre=$offre&titreoffre=".$t."  'class='btn' style='background-color:red; margin-left:70px;'>Refuser</a>
            <a href='Accepter.php?v=True&emaild=$e&emaile=$email&codeoffre=$offre&titreoffre=".$t."  'class='btn'style='background-color:green; margin-left:70px;'>Accepter</a>
            <a href='listerDemendes.php?'class='btn'style='background-color:#777 ;margin-left:70px;'>Back</a>

";

          }
          else{
            echo
            "               <a href='utilisateur2.php'  'class='btn'style='background-color:#777; margin-left:90px;'>Back</a>
           " ;
          }



          echo"
          

        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id='hero' class='d-flex flex-column justify-content-center align-items-center'>
    <div class='hero-container' data-aos='fade-in'>
      <h1>".$r[0]['nom']." ". $r[0]['prenom']."</h1>";
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
      $skills=$skills.$desc.",";
      }
   
      echo"
      <p>Competenses : <span class='typed' data-typed-items='".$skills."'></span></p>
    </div>
  </section><!-- End Hero -->

  <main id='main'>

    <!-- ======= About Section ======= -->
    <section id='about' class='about'>
      <div class='container'>

        <div class='section-title'>
          <h2>About</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class='row'>
          <div class='col-lg-4' data-aos='fade-right'>";
          echo'<img src = "data:image/png;base64,' . base64_encode ($pic) . ' alt="profile_pic" class="img-fluid  "/>';

          echo"  
          </div>
          <div class='col-lg-8 pt-4 pt-lg-0 content' data-aos='fade-left'>
            <h3>".$r[0]['nom']." " .$r[0]['prenom']."</h3>
            <p class='fst-italic'>
             </p>
            <div class='row'>
              <div class='col-lg-6'>
                <ul>
                  <li><i class='bi bi-chevron-right'></i> <strong>Birthday:</strong> <span>".$r[0]['date_nai']."</span></li>
                  <li><i class='bi bi-chevron-right'></i> <strong>CIN:</strong> <span>".$r[0]['cin']."</span></li>
                  <li><i class='bi bi-chevron-right'></i> <strong>Phone:</strong> <span>".$r[0]['numero']."</span></li>
                  <li><i class='bi bi-chevron-right'></i> <strong>City:</strong> <span>".$r[0]['adresse']."</span></li>
                </ul>
              </div>
              <div class='col-lg-6'>
                <ul>
                  <li><i class='bi bi-chevron-right'></i> <strong>Age:</strong> <span>30</span></li>
                  <li><i class='bi bi-chevron-right'></i> <strong>Diplome:</strong> <span>".$r[0]['diplome']."</span></li>
                  <li><i class='bi bi-chevron-right'></i> <strong>PhEmailone:</strong> <span>$cin</span></li>
                  <li><i class='bi bi-chevron-right'></i> <strong>YearExperience:</strong> <span>".$r[0]['experience']."</span></li>
                </ul>
              </div>
            </div>
            <p>
               </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Skills Section ======= -->
    <section id='skills' class='skills section-bg'>
      <div class='container'>

        <div class='section-title'>
          <h2>Skills</h2>
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
    echo"  <div class='progress'>
      <span class='skill'>$desc <i class='val'>$score%</i></span>
      <div class='progress-bar-wrap'>
        <div class='progress-bar' role='progressbar' aria-valuenow='$score' aria-valuemin='0' aria-valuemax='100'></div>
      </div>
    </div>";
      }
echo"
           


          </div>

         

            


          

          </div>

        </div>

      </div>
    </section><!-- End Skills Section -->

   
    

   

    <!-- ======= Contact Section ======= -->
    <section id='contact' class='contact'>
      <div class='container'>

        <div class='section-title'>
          <h2>Contact</h2>
        </div>

        <div class='row' data-aos='fade-in'>

          <div class='col-lg-5 d-flex align-items-stretch'>
            <div class='info'>
              <div class='address'>
                <i class='bi bi-geo-alt'></i>
                <h4>Location:</h4>
                <p>".$r[0]['adresse']."</p>
              </div>

              <div class='email'>
                <i class='bi bi-envelope'></i>
                <h4>Email:</h4>
                <p>".$r[0]['Email']."</p>
              </div>

              <div class='phone'>
                <i class='bi bi-phone'></i>
                <h4>Call:</h4>
                <p>".$r[0]['numero']."</p>
              </div>

            </div>
            

          </div>

          <div class='col-lg-5 d-flex align-items-stretch'>
            <div class='info'>
              <div class='address'>
                <i class='bi bi-facebook'></i>
                <h4>Facebook:</h4>
                <p>".$r[0]['adresse']."</p>
              </div>

              <div class='email'>
                <i class='bi bi-instagram'></i>
                <h4>Instagram:</h4>
                <p>".$r[0]['Email']."</p>
              </div>

              <div class='phone'>
                <i class='bi-linkedin'></i>
                <h4>Linkein:</h4>
                <p>".$r[0]['numero']."</p>
              </div>

            </div>
           

       

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id='footer'>
    <div class='container'>
      
      <div class='credits'>
     
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href='#' class='back-to-top d-flex align-items-center justify-content-center'><i class='bi bi-arrow-up-short'></i></a>

  <!-- Vendor JS Files -->
  <script src='assets1/vendor/purecounter/purecounter_vanilla.js'></script>
  <script src='assets1/vendor/aos/aos.js'></script>
  <script src='assets1/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>
  <script src='assets1/vendor/glightbox/js/glightbox.min.js'></script>
  <script src='assets1/vendor/isotope-layout/isotope.pkgd.min.js'></script>
  <script src='assets1/vendor/swiper/swiper-bundle.min.js'></script>
  <script src='assets1/vendor/typed.js/typed.min.js'></script>
  <script src='assets1/vendor/waypoints/noframework.waypoints.js'></script>
  <script src='assets1/vendor/php-email-form/validate.js'></script>

  <!-- Template Main JS File -->
  <script src='assets1/js/main.js'></script>

</body>

</html>";

?>
