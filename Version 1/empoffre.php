<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='listerDemendesF.css'>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='assets1/css/profilecssF.css' rel='stylesheet'>
    <link href='assets1/vendor/bootstrap-icons/bootstrap-icons.css' rel='stylesheet'>
  <link href='assets1/vendor/boxicons/css/boxicons.min.css' rel='stylesheet'>

    <script src='main.js'></script>
</head>
<body>
  <?php
  include ("connexion.php");
  session_start();
  $email= $_SESSION['email'];
  $passsowrd= $_SESSION['password'];
  $sth = $conn->prepare("SELECT * FROM utilisateur where   Email='$email'");
  $sth->execute();
      $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
    
      if($resultat){
  
          $_SESSION['email']=$email;
          $_SESSION['password']=$passsowrd;
          
          if( $resultat[0]["type"]=="Employeur")
          {
             include("headerE.php");
          }
          else {
  
            include("headerD.php");}
          }  
  ?>
     <!-- ======= Team Section ======= -->
     <section id="team" class="team section-bg" >
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Your offres</h2>
          <p></p>
        </div>

        <div class="row">
     <?php

$sth = $conn->prepare("SELECT * FROM offre where emailE='$email'");
$sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
    for ($i=0;$i<count($resultat);$i++){

      echo"
      <div  >
            <div class='member d-flex align-items-start'style='width: 600px ;     margin-left: 350px;
            '>
              <div class='paic'>";
              echo'<img src = "data:image/png;base64,' . base64_encode ($resultat[$i]["pic"]) . 'alt="profile_pic" style="width: 60px ;height:60px"/>';

              echo"
             </div>
              <div class='member-info ' style='width:300px; '>
                <h4>".$resultat[$i]['titre']."</h4>
                <span>Product Manager</span>
                <p >a demande l'accé a l'offre du <span class='pr'>".$resultat[$i]['etat']."</span></p>
                <a href='offresub.php?codeoffre=".$resultat[$i]['codeoffre']."'class='btn' style='background-color:grey'>VIEW SUBJESTED</a>

                <div class='social' >
                <a href='delete.php?codeoffre=".$resultat[$i]['codeoffre']."'  style='width:50px;height:50px;'><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                <path  d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
              </svg>    </a>             
                </div> ";
              
                echo"

";


echo"

              
              </div>
            </div>
          </div>
      ";



    }
    for ($i=0;$i<count($resultat);$i++)    {
      echo"
      <div class='offcanvas offcanvas-start' tabindex='-1' id='$i' aria-labelledby='offcanvasExampleLabel'>
           <div class='offcanvas-header'>
             <h5 class='offcanvas-title' id='offcanvasExampleLabel'>Profile</h5>
           </div>$i
           <div class='offcanvas-body'>
             "; 
             $cin=$resultat[$i]['email_demandeur'];
             $req=$conn->prepare("select * from demandeur where Email ='$cin'");
$req->execute();
$r=$req->fetchAll(PDO::FETCH_ASSOC);
$req1=$conn->prepare("select * from utilisateur where Email ='$cin'");
$req1->execute();
$r1=$req1->fetchAll(PDO::FETCH_ASSOC);
$pic=$r1[0]['pic'];
echo" 
<header id='header' style='width:400px;height:100%;'>

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
  for($j=0;$j<count($r2);$j++)
      { $numc=$r2[$j]['numc'];
        $req3=$conn->prepare("select * from competenses where numc='$numc'");
        $req3->execute();
      $r3=$req3->fetchAll(PDO::FETCH_ASSOC);
      $desc=$r3[0]['description'];
      $skills=$skills.$desc."<br>";
      }
      echo"
      <h2 style='color:white; padding-right:30px;font-size:2.5rem;padding-bottom:20px;'>About</h2>

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

      <section id='skills' class='skills section-bg' style='    background-color:#040b14;'>
      <div class='container'>

      <h2 style='color:white; padding-right:30px;font-size:2.5rem;padding-bottom:20px;'>Skills</h2>


        <div class='row skills-content'>

          <div class='col-lg-6' data-aos='fade-up'>
";

$req2=$conn->prepare("select * from competensesd where email='$cin'");
      $req2->execute();
      $r2=$req2->fetchAll(PDO::FETCH_ASSOC);
      for($j=0;$j<count($r2);$j++)
      { $numc=$r2[$j]['numc'];
        
        $req3=$conn->prepare("select * from competenses where numc='$numc'");
        $req3->execute();
      $r3=$req3->fetchAll(PDO::FETCH_ASSOC);
      $desc=$r3[0]['description'];
      $score=$r2[$j]['score'];
  echo"
  <div class='progress' style='width:250px; height:20px ;     background-color:#040b14;   
  ' >
  <strong class='skill' style='font-size:1rem;     margin-right: 16px ;color:white
  '>$desc</strong>
  <div class='progress-bar' role='progressbar' style='width: $score%;' aria-valuenow='$score' aria-valuemin='0' aria-valuemax='100'>$score%</div>
</div>
<br>
";
      }
      echo"
</div>
";

echo"</div></header>";
    echo " </div>
  </div>
";

    }

?>

        
</div>

</div>


</body>
<script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script >
  var y=0;
function myfn() {
  let boxes=[...document.querySelectorAll('.packages .box-container .box')];
  for( var i =y;i<y+3;i++)
  {
    boxes[i].style.display='inline-block';
  }
  y+=3;
}

const x=document.getElementsByClassName('wrap');
function close1(){
    x[0].className='wrap';
}
function active(){
    x[0].className='wrap active';
}
function diactive1(){x[0].className='wrap active-btn';

}
function btnlogin(){
    x[0].className='wrap active-btn';
}
function regis2(){
    x[0].className='wrap t1';
}
var swiper = new Swiper(".home-slider", {
    loop:true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
    

     
     let xa=1;
        let submenu=document.getElementById("sub-menu");
        function togglemenu(){
            if( xa%2==0)
            {
                submenu.className=("sub-menu-wrap-open-menu");
                xa++;
            }
            else
            {
                submenu.className=("sub-menu-wrap");
                xa++;

            }
          
        }
        $(document).ready(function(){
			$(".notification_icon .fa-bell").click(function(){
				$(".dropdown").toggleClass("active");
			})
		});
	</script>

</html>